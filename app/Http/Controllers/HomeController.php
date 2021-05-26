<?php

namespace App\Http\Controllers;

use App\ObatProduk;
use App\Produk;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Produk::latest()->get();
        return view('home', compact('products'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
