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
                $produk->id => [
                    $request->color => [
                        $request->jenis_kain => [
                            'id' => $produk->id,
                            'name' => $produk->nama,
                            'price' => $produk->harga,
                            'quantity' => $request->quantity,
                            'image' => json_decode($produk->foto)[0],
                            'color' => $request->color,
                            'jenis_kain' => $request->jenis_kain,
                        ]
                    ]
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
            // return redirect()->route('cart.index');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$produk->id][$request->color][$request->jenis_kain])) {
            $cart[$produk->id][$request->color][$request->jenis_kain]['quantity'] += $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
            // return redirect()->route('cart.index');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$produk->id][$request->color][$request->jenis_kain] = [
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
        // dd($carts);

        $colorId = 0;
        $sumTotal = 0;
        $totalItem = 0;

        if($carts) {
            foreach ($carts as $cart) {
                foreach ($cart as $color) {
                    $totalItem += count($color);
                    foreach ($color as $type) {
                        $colorId = $type['color'];
                        $total = $type['price'] * $type['quantity'];
                        $sumTotal += $total;
                    }
                }
            }
        }

        // redirect if totalItem is 0
        if($totalItem < 1) {
            return redirect()->route('home');
        }

        return view('pages.cart.index', compact('carts', 'colors', 'sumTotal', 'totalItem'));
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

    public function deleteCart(Produk $produk, $color, $jenis)
    {
        if($produk->id) {
            $carts = session()->get('cart');

            if(isset($carts[$produk->id][$color][$jenis])) {
                unset($carts[$produk->id][$color][$jenis]);
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
        $totalItem = 0;

        if($carts) {
            foreach ($carts as $cart) {
                foreach ($cart as $color) {
                    $totalItem += count($color);
                    foreach ($color as $type) {
                        $total = $type['price'] * $type['quantity'];
                        $sumTotal += $total;
                    }
                }
            }
        }

        return view('pages.cart.checkout', compact('carts', 'sumTotal', 'totalItem'));
    }
}
