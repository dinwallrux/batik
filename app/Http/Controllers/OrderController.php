<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\CheckoutEmail;
use App\OrderProduk;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Darryldecode\Cart\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = 1;
        $datas = Order::latest()->get();
        return view('pages.pesanan.index', compact('number', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'shipping_fullname' => 'required',
            'shipping_state' => 'required',
            'shipping_city' => 'required',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
            'shipping_zipcode' => 'required',
        ];

        $carts = session()->get('cart');
        $sumTotal = 0;
        foreach ($carts as $cart) {
            $total = $cart['price'] * $cart['quantity'];
            $sumTotal += $total;
        }

        $datas = [
            'order_number' => uniqid('OrderNumber-'),
            'user_id' => auth()->id(),
            'grand_total' => $sumTotal,
            'item_count' => count(session()->get('cart')),

            'shipping_fullname' => $request->fullname,
            'shipping_address' => $request->address,
            'shipping_city' => $request->city,
            'shipping_state' => 'Indonesia',
            'shipping_zipcode' => $request->zipcode,
            'shipping_phone' => $request->phone,
            'shipping_email' => $request->email,
            'notes' => $request->notes,
        ];

        $validator = Validator::make($datas, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('checkout')->withErrors($errors)->withInput($request->all());
        } else{
            $order = Order::create($datas);

            $carts = session()->get('cart');
            foreach($carts as $cart) {
                $order->items()->attach($cart['id'], ['price'=> $cart['price'], 'quantity'=> $cart['quantity'], 'obat_id' => $cart['color'] ]);
            }

            // Empty cart
            session()->forget('cart');

            $produkOrdered = Order::where('id', $order->id)->with('items')->get()->first();
            // Send email to customer
            Mail::to($request->email)->send(new CheckoutEmail($produkOrdered));

            // Thank you page
            return redirect()->route('order.success')
                ->with('success', 'Order berhasil.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('pages.pesanan.editView', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function orderSuccess()
    {
        return view('pages.cart.orderSuccess');
    }
}
