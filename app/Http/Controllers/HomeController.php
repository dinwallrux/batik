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
        $carts = session()->get('cart');

        $profil = Profil::all()->first();
        $products = Produk::latest()->get();
        $totalItem = 0;

        if($carts) {
            foreach ($carts as $cart) {
                foreach ($cart as $color) {
                    $totalItem += count($color);
                }
            }
        }
        return view('home', compact('products', 'profil', 'totalItem'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
