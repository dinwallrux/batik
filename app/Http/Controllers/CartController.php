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

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $produk->id + $request->color => [
                    'id' => $produk->id,
                    'name' => $produk->nama,
                    'price' => $produk->harga,
                    'quantity' => $request->quantity,
                    'image' => json_decode($produk->foto)[0],
                    'color' => $request->color,
                    'jenis_kain' => $request->jenis_kain,
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
            // return redirect()->route('cart.index');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$produk->id + $request->color])) {
            $cart[$produk->id + $request->color]['quantity'] += $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
            // return redirect()->route('cart.index');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$produk->id + $request->color] = [
            'id' => $produk->id,
            'name' => $produk->nama,
            'price' => $produk->harga,
            'quantity' => $request->quantity == null ? "1" : $request->quantity,
            'image' => json_decode($produk->foto)[0],
            'color' => $request->color,
            'jenis_kain' => $request->jenis_kain,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
        // return redirect()->route('cart.index');
    }

    public function index()
    {
        $carts = session()->get('cart');
        // if(!isset($carts)) {
        //     if ( auth()->user()->peran != 'admin' ) {
        //         return redirect()->route('order.self');
        //     } else {
        //         return redirect()->route('orders.index');
        //     }
        // }
        // if(count($carts) < 1) {
        //     return redirect()->route('home');
        // }

        $colorId = 0;
        $sumTotal = 0;
        foreach ($carts as $cart) {
            $colorId = $cart['color'];
            $total = $cart['price'] * $cart['quantity'];
            $sumTotal += $total;
        }

        return view('pages.cart.index', compact('carts', 'colors', 'sumTotal'));
    }

    public function updateCart(Request $request, Produk $produk, $color)
    {
        // update the item on cart
        $cart = session()->get('cart');
        $cart[$produk->id + $color]['quantity'] = $request->quantity;

        session()->put('cart', $cart);
        session()->flash('success', 'Cart updated successfully');
        return redirect()->back();
    }

    public function deleteCart(Produk $produk, $color)
    {
        if($produk->id) {
            $carts = session()->get('cart');

            if(isset($carts[$produk->id + $color])) {
                unset($carts[$produk->id + $color]);
                session()->put('cart', $carts);
                session()->flash('success', 'Product has been removed');
                return redirect()->back();
            }
        }
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
