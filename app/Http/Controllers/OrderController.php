<?php

namespace App\Http\Controllers;

use App\Order;
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

        $datas = [
            'order_number' => uniqid('OrderNumber-'),
            'user_id' => auth()->id(),
            'grand_total' => \Cart::session(auth()->id())->getTotal(),
            'item_count' => \Cart::session(auth()->id())->getContent()->count(),
            
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
            
            $cartItems = \Cart::session(auth()->id())->getContent();
            foreach($cartItems as $item) {
                $order->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
            }

            // Empty cart
            \Cart::session(auth()->id())->clear();

            // Send email to customer

            // Thank you page
            return redirect()->route('home')
                ->with('success', 'Obat berhasil ditambahkan.');
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
}
