<?php

namespace App\Http\Controllers;

use App\ObatProduk;
use App\Produk;
use App\Profil;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $profil = Profil::all()->first();
        $products = Produk::latest()->get();
        return view('home', compact('products', 'profil'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
