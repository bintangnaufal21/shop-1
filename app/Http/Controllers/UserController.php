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

        Auth::login($user); // <-- Pengguna otomatis login

        // ================== PERBAIKAN DI SINI ==================
        // Arahkan ke halaman utama (home), BUKAN ke halaman login lagi.
        return redirect()->route('home')->with('success', 'Registrasi berhasil! Selamat datang.');
        // =====================================================
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
            // LOGIKA GABUNG KERANJANG
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
            $dbCartItem = Cart::where('user_id', $userId)
                ->where('produk_id', $id)
                ->first();

            if ($dbCartItem) {
                $dbCartItem->quantity += $item['qty'];
                $dbCartItem->save();
            } else {
                Cart::create([
                    'user_id' => $userId,
                    'produk_id' => $id,
                    'quantity' => $item['qty'],
                    'harga' => $item['harga']
                ]);
            }
        }

        session()->forget('cart');
    }
}
