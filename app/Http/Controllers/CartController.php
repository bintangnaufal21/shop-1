<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Menampilkan halaman keranjang belanja.
     */
    public function cart()
    {
        $cart = [];
        $subtotal = 0;

        if (Auth::check()) {
            // Pengguna LOGIN: Ambil dari DATABASE
            $userId = Auth::id();
            // ==========================================================
            // PERBAIKAN: Kita perlu JOIN dengan tabel 'produks'
            // untuk mendapatkan NAMA and GAMBAR
            // ==========================================================
            $dbItems = Cart::where('user_id', $userId)->with('produk')->get();

            foreach ($dbItems as $dbItem) {
                if ($dbItem->produk) { // Pastikan produk masih ada
                    $cart[$dbItem->produk_id] = [
                        // Ambil nama & gambar DARI PRODUK
                        "nama_produk" => $dbItem->produk->nama_produk,
                        "gambar" => $dbItem->produk->gambar,
                        // Ambil qty & harga DARI KERANJANG
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

        return view('landing.cart', compact('cart', 'subtotal'));
    }

    /**
     * Menambah produk ke keranjang.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produks,id',
            'qty' => 'required|integer|min:1',
        ]);

        $productId = $request->product_id;
        $quantity = $request->qty;
        $product = Produk::findOrFail($productId); // Ambil detail produk

        if (Auth::check()) {
            // Pengguna LOGIN: Simpan ke DATABASE
            $userId = Auth::id();

            $dbCartItem = Cart::where('user_id', $userId)
                              ->where('produk_id', $productId)
                              ->first();

            if ($dbCartItem) {
                // Update kuantitas
                $dbCartItem->quantity += $quantity;
                $dbCartItem->save();
            } else {
                // Buat baru
                // ===============================================
                // PERBAIKAN DI SINI: Tambahkan 'harga'
                // ===============================================
                Cart::create([
                    'user_id' => $userId,
                    'produk_id' => $productId,
                    'quantity' => $quantity,
                    'harga' => $product->harga,             // <-- TAMBAHKAN BARIS INI
                ]);
            }
        } else {
            // Pengguna TAMU: Simpan ke SESSION
            // (Session perlu nama & gambar, jadi ini sudah benar)
            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId]['qty'] += $quantity;
            } else {
                $cart[$productId] = [
                    "nama_produk" => $product->nama_produk,
                    "qty" => $quantity,
                    "harga" => $product->harga,
                    "gambar" => $product->gambar
                ];
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Update kuantitas produk di keranjang.
     */
    public function update(Request $request, $id) // $id di sini adalah produk_id
    {
        $request->validate(['qty' => 'required|integer|min:1']);
        $quantity = $request->qty;

        if (Auth::check()) {
            // Pengguna LOGIN: Update DATABASE
            $dbCartItem = Cart::where('user_id', Auth::id())
                              ->where('produk_id', $id)
                              ->first();

            if ($dbCartItem) {
                $dbCartItem->quantity = $quantity;
                $dbCartItem->save();
            }
        } else {
            // Pengguna TAMU: Update SESSION
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                $cart[$id]['qty'] = $quantity;
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart')->with('success', 'Kuantitas berhasil diupdate.');
    }

    /**
     * Menghapus produk dari keranjang.
     */
    public function remove($id) // $id di sini adalah produk_id
    {
        if (Auth::check()) {
            // Pengguna LOGIN: Hapus dari DATABASE
            Cart::where('user_id', Auth::id())
                ->where('produk_id', $id)
                ->delete();
        } else {
            // Pengguna TAMU: Hapus dari SESSION
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart')->with('success', 'Produk berhasil dihapus.');
    }
}
