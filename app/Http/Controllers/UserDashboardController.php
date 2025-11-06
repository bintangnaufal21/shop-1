<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Penting untuk otentikasi
use App\Models\Order; // <-- Model Order yang sudah kita buat

class UserDashboardController extends Controller
{
    /**
     * Menampilkan halaman utama dashboard (daftar pesanan).
     */
    public function index()
    {
        // 1. Dapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // 2. Ambil semua pesanan dari database yang 'user_id'-nya
        //    cocok dengan pengguna yang login.
        //    Urutkan dari yang terbaru.
        $orders = Order::where('user_id', $userId)
                       ->latest() // Mengurutkan dari terbaru
                       ->paginate(10); // Paginate jika pesanan banyak

        // 3. Tampilkan view dan kirim data 'orders'
        return view('landing.dashboard.index', compact('orders'));
    }

    /**
     * (LANGKAH SELANJUTNYA) Menampilkan detail satu pesanan.
     */
    public function show($id)
    {
        // Logika untuk menampilkan detail pesanan
        $order = Order::where('user_id', Auth::id())->with('items')->findOrFail($id);

        // Kita perlu membuat view 'show.blade.php' ini
        return view('landing.dashboard.show', compact('order'));
    }
}
