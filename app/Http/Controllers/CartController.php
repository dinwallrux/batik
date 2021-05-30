<?php

namespace App\Http\Controllers;

use App\Obat;
use App\Produk;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class CartController extends Controller
{
    public function addCart(Produk $produk, Request $request)
    {
        $cart = session()->get('cart');

        if(!$cart) {
            $cart = [
                $produk->id => [
                    'id' => $produk->id,
                    'name' => $produk->nama,
                    'price' => $produk->harga,
                    'quantity' => 1,
                    'image' => $produk->gambar,
                    'color' => $request->color,
                ]
            ];

            session()->put('cart', $cart);
//            return redirect()->back()->with('success', 'Product added to cart successfully!');
            return redirect()->route('cart.index');
        }

        if(isset($cart[$produk->id])) {
            $cart[$produk->id]['quantity']++;
            session()->put('cart', $cart);
//            return redirect()->back()->with('success', 'Product added to cart successfully!');
            return redirect()->route('cart.index');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$produk->id] = [
            'id' => $produk->id,
            'name' => $produk->nama,
            'price' => $produk->harga,
            'quantity' => 1,
            'image' => $produk->gambar,
            'color' => $request->color,
        ];
        session()->put('cart', $cart);
//        return redirect()->back()->with('success', 'Product added to cart successfully!');
        return redirect()->route('cart.index');
    }

    public function index()
    {
        $carts = session()->get('cart');
        if(!isset($carts)) {
            return redirect()->back();
        }
        if(count($carts) < 1) {
            return redirect()->route('home');
        }

        $colorId = 0;
        $sumTotal = 0;
        foreach ($carts as $cart) {
            $colorId = $cart['color'];
            $total = $cart['price'] * $cart['quantity'];
            $sumTotal += $total;
        }
        $color = Obat::all()->where('id', $colorId)->first();

        return view('pages.cart.index', compact('carts', 'color', 'sumTotal'));
    }

    public function updateCart(Request $request, Produk $produk)
    {
        // update the item on cart
        $cart = session()->get('cart');
        $cart[$produk->id]['quantity'] = $request->quantity;

        session()->put('cart', $cart);
        session()->flash('success', 'Cart updated successfully');
        return redirect()->back();
    }

    public function deleteCart(Produk $produk)
    {
        if($produk->id) {
            $cart = session()->get('cart');
            if(isset($cart[$produk->id])) {
                unset($cart[$produk->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product has been removed');
        }

        return redirect()->back();
    }

    public function viewCheckout()
    {
        $carts = session()->get('cart');
        $sumTotal = 0;
        foreach ($carts as $cart) {
            $total = $cart['price'] * $cart['quantity'];
            $sumTotal += $total;
        }

        return view('pages.cart.checkout', compact('carts', 'sumTotal'));
    }
}
