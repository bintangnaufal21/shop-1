<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rute Publik (Bisa diakses siapa saja)
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'home'])->name('home');
Route::get('/shop', [LandingController::class, 'shop'])->name('shop');
Route::get('/categories', [LandingController::class, 'categories'])->name('categories');
Route::get('/category/{slug}', [LandingController::class, 'category'])->name('category');
Route::get('/promo', [LandingController::class, 'promo'])->name('promo');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');
Route::get('/about', [LandingController::class, 'about'])->name('about');
// Halaman Detail Produk (Contoh)
// Route::get('/product-detail/{id}', [LandingController::class, 'productDetail'])->name('product.detail');


/*
|--------------------------------------------------------------------------
| Rute Keranjang (Cart) - (Publik)
|--------------------------------------------------------------------------
*/
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/clear-cart', function () { // Rute pembersih (untuk debug)
    session()->forget('cart');
    return redirect()->route('cart')->with('success', 'Keranjang telah dikosongkan!');
});


/*
|--------------------------------------------------------------------------
| Rute Otentikasi (Login/Register) - (Publik)
|--------------------------------------------------------------------------
*/
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('regis.store');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Rute Pengguna (Harus Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Halaman Checkout (Memerlukan Login)
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Halaman Dashboard User (Riwayat Pesanan)
    // URL diubah ke /akun untuk menghindari konflik
    Route::get('/akun', [UserDashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/akun/order/{id}', [UserDashboardController::class, 'show'])->name('dashboard.show');

    // Halaman Profile User
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});


/*
|--------------------------------------------------------------------------
| Rute Admin (Harus Login & Role Admin)
|--------------------------------------------------------------------------
*/
// Rute ini dilindungi oleh middleware 'auth' (harus login)
// DAN 'admin' (Penjaga yang kita buat, harus punya role 'admin')
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Halaman Dashboard Admin (URL: /admin/dashboard)
    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Rute User (URL: /admin/user)
    Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::post('/user/create', [UserController::class, 'store'])->name('admin.user.store');

    // Rute Kategori (URL: /admin/kategori)
    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.delete');

    // Rute Produk (URL: /admin/produk)
    Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('admin.produk.create');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('admin.produk.store');
    Route::get('/produk/show/{id}', [ProdukController::class, 'show'])->name('admin.produk.show');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('admin.produk.edit');
    Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.delete');

    // Rute Laporan (URL: /admin/laporan)
    Route::get('/laporan', function () {
        return view('laporan');
    })->name('admin.laporan');

    // Rute Pesanan (URL: /admin/pesanan)
    Route::get('/pesanan', [PesananController::class, 'index'])->name('admin.pesanan');
    Route::get('/pesanan/detail/{id}', [PesananController::class, 'show'])->name('admin.pesanan.show');
    Route::post('/pesanan/update/{id}', [PesananController::class, 'updateStatus'])->name('admin.pesanan.updateStatus');

});
