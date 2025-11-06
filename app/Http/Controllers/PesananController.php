<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Model untuk tabel 'orders'

class PesananController extends Controller
{
    /**
     * Menampilkan daftar semua pesanan untuk Admin.
     */
    public function index()
    {
        // Ambil semua pesanan, urutkan dari yang terbaru
        // Muat relasi 'user' untuk menampilkan nama pemesan
        $pesanans = Order::with('user')
                        ->latest()
                        ->paginate(15); // Tampilkan 15 per halaman

        // Kirim data ke view 'pesanan'
        return view('pesanan', compact('pesanans'));
    }

    /**
     * Menampilkan detail satu pesanan untuk Admin.
     */
    public function show($id)
    {
        // Ambil satu pesanan beserta item-item di dalamnya
        // 'items.produk' akan memuat item DAN produk terkait di setiap item
        $pesanan = Order::with('items.produk', 'user')->findOrFail($id);

        return view('detail_pesanan', compact('pesanan'));
    }

    /**
     * Mengubah status pesanan.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,dikirim,selesai,dibatalkan',
        ]);

        $pesanan = Order::findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->save();

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
