<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use App\Models\Pesanan;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function dashboard()
    {
        $totalUser = User::count();
        $totalKategori = Kategori::count();
        $totalProduk = Produk::count();
        /* $totalPesanan = Pesanan::count(); */

        return view('dashboard', compact('totalUser', 'totalKategori', 'totalProduk', /* 'totalPesanan' */));
    }
}
