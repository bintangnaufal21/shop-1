<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produk;
use App\Models\Cart; // <-- Diperlukan untuk Logika Hybrid
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout.
     * (Logika Hybrid)
     */
    public function index()
    {
        $cart = [];
        $subtotal = 0;

        if (Auth::check()) {
            // Pengguna LOGIN: Ambil dari DATABASE
            $userId = Auth::id();
            $dbItems = Cart::where('user_id', $userId)->with('produk')->get();

            foreach ($dbItems as $dbItem) {
                if ($dbItem->produk) {
                    $cart[$dbItem->produk_id] = [
                        "nama_produk" => $dbItem->produk->nama_produk,
                        "gambar" => $dbItem->produk->gambar,
                        "qty" => $dbItem->quantity,
                        "harga" => $dbItem->harga,
                    ];
                    $subtotal += $dbItem->harga * $dbItem->quantity;
                }
            }
        } else {
            // Pengguna TAMU: Ambil dari SESSION
            $cart = session()->get('cart', []);
            foreach ($cart as $id => $item) {
                $subtotal += $item['harga'] * $item['qty'];
            }
        }

        // Periksa (SETELAH digabung) apakah keranjang kosong
        if (count($cart) == 0) {
            return redirect('/shop')->with('error', 'Keranjang Anda kosong. Silakan belanja dulu.');
        }

        $ongkir = 10000; // Contoh ongkir
        $total = $subtotal + $ongkir;

        return view('landing.checkout', compact('cart', 'subtotal', 'ongkir', 'total'));
    }

    /**
     * Memproses pesanan.
     * (Logika Hybrid & Nama Pengguna Diperbarui)
     */
    public function store(Request $request)
    {
        // 1. ========================================================
        //    PERUBAHAN VALIDASI DI SINI
        //    ========================================================
        $validated = $request->validate([
            'nama_pengguna' => 'required|string|max:100', // <-- HANYA NAMA PENGGUNA
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'alamat_1' => 'required|string|max:255',
            'alamat_2' => 'nullable|string|max:255',
            'kota' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kode_pos' => 'required|string|max:10',
            'metode_pembayaran' => 'required|string',
            'catatan_pesanan' => 'nullable|string',
        ]);
        // ========================================================
        //    AKHIR PERUBAHAN
        // ========================================================

        // 2. Ambil keranjang (Logika Hybrid)
        $cart = [];
        $subtotal = 0;
        $userId = Auth::id();

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk checkout.');
        }

        $dbItems = Cart::where('user_id', $userId)->get();
        foreach ($dbItems as $dbItem) {
            $cart[$dbItem->produk_id] = [
                'nama_produk' => $dbItem->produk->nama_produk,
                'harga' => $dbItem->harga,
                'qty' => $dbItem->quantity,
            ];
            $subtotal += $dbItem->harga * $dbItem->quantity;
        }

        if (count($cart) == 0) {
            return redirect('/shop')->with('error', 'Keranjang Anda kosong.');
        }

        $ongkir = 10000;
        $total = $subtotal + $ongkir;

        DB::beginTransaction();

        try {
            // 3. Buat data Order
            $order = Order::create([
                'user_id' => $userId,
                'kode_order' => 'INV-' . strtoupper(uniqid()),
                // ========================================================
                // PERUBAHAN PENYIMPANAN DI SINI
                // ========================================================
                'nama_penerima' => $validated['nama_pengguna'], // <-- HANYA NAMA PENGGUNA
                // ========================================================
                'email_penerima' => $validated['email'],
                'telepon_penerima' => $validated['telepon'],
                'alamat_pengiriman' => $validated['alamat_1'] . ', ' . $validated['alamat_2'] . ', ' . $validated['kota'] . ', ' . $validated['provinsi'],
                'kota' => $validated['kota'],
                'kode_pos' => $validated['kode_pos'],
                'subtotal' => $subtotal,
                'ongkir' => $ongkir,
                'total' => $total,
                'status' => 'pending',
                'catatan' => $validated['catatan_pesanan'],
            ]);

            // 4. Simpan Detail Pesanan
            foreach ($cart as $id => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'produk_id' => $id,
                    'nama_produk' => $item['nama_produk'],
                    'harga' => $item['harga'],
                    'quantity' => $item['qty'],
                    'subtotal' => $item['harga'] * $item['qty']
                ]);
            }

            // 5. Commit ke database
            DB::commit();

            // 6. Kosongkan keranjang DARI DATABASE
            Cart::where('user_id', $userId)->delete();

            // 7. Redirect ke halaman dashboard
            return redirect()->route('dashboard.index')->with('success', 'Pesanan Anda telah berhasil dibuat!');
        } catch (\Exception $e) {
            // 8. Jika gagal, rollback dan kirim pesan error
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan halaman sukses (Tidak dipakai jika redirect ke dashboard)
     */

    public function success()
    {
        if (!session('success_message')) {
            return redirect('/shop');
        }
        return view('landing.success');
    }
}
