<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class LandingController extends Controller
{
    public function home()
    {
        return view('landing.home');
    }

    public function shop()
    {
        $produks = Produk::latest()->get();
        return view('landing.shop', compact('produks'));

    }

    public function categories()
    {
        return view('landing.categories');
    }

    public function category($slug)
    {
        return view('landing.category', compact('slug'));
    }

    public function promo()
    {
        return view('landing.promo');
    }

    public function contact()
    {
        return view('landing.contact');
    }

    public function about()
    {
        return view('landing.about');
    }
}
