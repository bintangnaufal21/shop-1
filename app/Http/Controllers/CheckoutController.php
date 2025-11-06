<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;        // Pastikan Anda punya model Order.php
use App\Models\OrderItem;   // Pastikan Anda punya model OrderItem.php
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout.
     */
    public function index()
    {
        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            // Jika keranjang kosong, redirect kembali ke halaman shop
            return redirect('/shop')->with('error', 'Keranjang Anda kosong. Silakan belanja dulu.');
        }

        // Hitung subtotal
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga'] * $item['qty']; // 'qty' dari CartController
        }

        // Anda bisa tambahkan ongkir, pajak, dll di sini
        $ongkir = 10000; // Contoh ongkir
        $total = $subtotal + $ongkir;

        // Tampilkan view checkout
        return view('landing.checkout', compact('cart', 'subtotal', 'ongkir', 'total'));
    }

    /**
     * Memproses pesanan.
     * Ini adalah fungsi store() yang LENGKAP dan DISESUAIKAN
     */
    public function store(Request $request)
    {
        // 1. Validasi data dari form (nama field dari form)
        $validated = $request->validate([
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'alamat_1' => 'required|string|max:255',
            'alamat_2' => 'nullable|string|max:255',
            'kota' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100', // <-- Pastikan ini ada di form
            'kode_pos' => 'required|string|max:10',
            'metode_pembayaran' => 'required|string', // <-- Ini tidak disimpan ke DB, hanya validasi
            'catatan_pesanan' => 'nullable|string',
        ]);

        // 2. Ambil keranjang & hitung ulang total
        $cart = session()->get('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga'] * $item['qty'];
        }
        $ongkir = 10000; // Contoh ongkir
        $total = $subtotal + $ongkir;

        // Gunakan DB Transaction
        DB::beginTransaction();

        try {
            // 3. Buat data Order (MENYESUAIKAN DENGAN TABEL ANDA)
            $order = Order::create([
                'user_id' => Auth::id(), // null jika user adalah guest
                'kode_order' => 'INV-' . strtoupper(uniqid()), // Sesuai 'kode_order'
                'nama_penerima' => $validated['nama_depan'] . ' ' . $validated['nama_belakang'], // Sesuai 'nama_penerima'
                'email_penerima' => $validated['email'], // Sesuai 'email_penerima'
                'telepon_penerima' => $validated['telepon'], // Sesuai 'telepon_penerima'
                'alamat_pengiriman' => $validated['alamat_1'] . ', ' . $validated['alamat_2'] . ', ' . $validated['kota'] . ', ' . $validated['provinsi'], // Sesuai 'alamat_pengiriman'
                'kota' => $validated['kota'],
                'kode_pos' => $validated['kode_pos'],
                'subtotal' => $subtotal,
                'ongkir' => $ongkir,
                'total' => $total,
                'status' => 'pending', // Sesuai 'status' enum
                'catatan' => $validated['catatan_pesanan'], // Sesuai 'catatan'
            ]);

            // 4. Simpan Detail Pesanan (MENYESUAIKAN DENGAN TABEL ANDA)
            foreach ($cart as $id => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'produk_id' => $id,
                    'nama_produk' => $item['nama_produk'],
                    'harga' => $item['harga'],
                    'quantity' => $item['qty'], // Sesuai 'quantity'
                    'subtotal' => $item['harga'] * $item['qty'] // Sesuai 'subtotal'
                ]);
            }

            // 5. Commit ke database
            DB::commit();

            // 6. Kosongkan keranjang
            session()->forget('cart');

            // 7. Redirect ke halaman sukses
            return redirect()->route('dashboard.index')->with('success_message', 'Pesanan Anda telah berhasil dibuat!');

        } catch (\Exception $e) {
            // 8. Jika gagal, rollback dan kirim pesan error
            DB::rollBack();
            // Tampilkan error (untuk debug)
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan halaman sukses
     */
    public function success()
    {
        // Pastikan halaman ini hanya bisa diakses setelah sukses checkout
        if (!session('success_message')) {
            return redirect('/shop');
        }

        return view('landing.success');
        // Jangan lupa buat file view: resources/views/landing/success.blade.php
    }
}
