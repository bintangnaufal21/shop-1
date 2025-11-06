<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Produk;

class UserController extends Controller
{
    public function index()
    {
        $dataUser = User::get();
        return view('user', compact('dataUser'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // ===============================================
            // LOGIKA GABUNG KERANJANG (TAMBAHKAN INI)
            // ===============================================
            $this->mergeSessionCartWithDatabaseCart();
            // ===============================================

            // Redirect berdasarkan role
            if (Auth::user()->role == 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }
            return redirect()->intended(route('home')); // Arahkan ke home
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        // Saat logout, keranjang di database aman.
        // Laravel akan otomatis menghapus session.
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    private function mergeSessionCartWithDatabaseCart()
    {
        $sessionCart = session()->get('cart', []);
        $userId = Auth::id();

        if (empty($sessionCart)) {
            return; // Tidak ada yang perlu digabung
        }

        foreach ($sessionCart as $id => $item) {
            // Cek apakah item sudah ada di keranjang database
            $dbCartItem = Cart::where('user_id', $userId)
                              ->where('produk_id', $id)
                              ->first();

            if ($dbCartItem) {
                // Jika sudah ada, update kuantitasnya
                $dbCartItem->quantity += $item['qty'];
                $dbCartItem->save();
            } else {
                // Jika belum ada, buat entri baru
                // ===============================================
                // PERBAIKAN DI SINI: Tambahkan 'harga'
                // ===============================================
                Cart::create([
                    'user_id' => $userId,
                    'produk_id' => $id,
                    'quantity' => $item['qty'],
                    'harga' => $item['harga']             // <-- TAMBAHKAN BARIS INI
                    // Kita tidak perlu 'nama_produk' atau 'gambar'
                    // karena tabel 'carts' Anda tidak memilikinya.
                ]);
            }
        }

        // Hapus keranjang session setelah digabung
        session()->forget('cart');
    }
}
