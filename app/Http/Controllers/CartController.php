<?php

namespace App\Http\Controllers;

use App\Produk;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Produk $produk)
    {
        // Tambah produk ke cart
        \Cart::session(auth()->id())->add(array(
            'id' => $produk->id,
            'name' => $produk->nama,
            'price' => $produk->harga,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $produk
        ));

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $cartItems = \Cart::session(auth()->id())->getContent();

        return view('pages.cart.index', compact('cartItems'));
    }

    public function updateCart(Request $request, Produk $produk)
    {
        // update the item on cart
        \Cart::session(auth()->id())->update($produk->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));

        return redirect()->back();
    }

    public function deleteCart(Produk $produk)
    {
        \Cart::session(auth()->id())->remove($produk->id);

        return redirect()->back();
    }

    public function viewCheckout()
    {
        $cartItems = \Cart::session(auth()->id())->getContent();

        return view('pages.cart.checkout', compact('cartItems'));
    }
}
