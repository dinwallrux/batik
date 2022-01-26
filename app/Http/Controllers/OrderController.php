<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\CheckoutEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use File;
use Image;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( auth()->user()->peran != 'admin' ) {
            return redirect()->route('order.self');
        }

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
            foreach ($cart as $color) {
                foreach ($color as $type) {
                    $total = $type['price'] * $type['quantity'];
                    $sumTotal += $total;
                }
            }
        }
        $sumTotal += $request->ongkir;

        $datas = [
            'order_number' => uniqid('OrderNumber-'),
            'user_id' => auth()->id(),
            'grand_total' => $sumTotal,
            'item_count' => count(session()->get('cart')),

            'shipping_fullname' => $request->fullname,
            'shipping_address' => $request->address,
            'shipping_city' => $request->shipping_city,
            'shipping_state' => $request->shipping_state,
            'shipping_zipcode' => $request->shipping_zipcode,
            'shipping_phone' => $request->phone,
            'shipping_email' => $request->email,
            'notes' => $request->notes,
            'ongkir' => $request->ongkir,
            'kurir' => $request->kurir,
            'layanan' => $request->layanan
        ];

        $validator = Validator::make($datas, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('checkout')->withErrors($errors)->withInput($request->all());
        } else{
            $order = Order::create($datas);

            $carts = session()->get('cart');
            foreach ($carts as $cart) {
                foreach ($cart as $color) {
                    foreach ($color as $type) {
                        $order->items()->attach(
                            $type['id'], 
                            [
                                'price'=> $type['price'], 
                                'quantity'=> $type['quantity'], 
                                'obat_id' => $type['color'],
                                'jenis_kain' => $type['jenis_kain'],
                            ]
                        );
                    }
                }
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
        $orderDetail = Order::where('id', $order->id)->with('items')->get()->first();

        return view('pages.pesanan.show', compact('orderDetail'));
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
        $rules = [
            'status' => 'required',
        ];

        // set status if $request status is null
        $status = $order->status;

        if($request->status != null) {
            $status = $request->status;
        }

        $data = [
            'status' => $status,
            'status_pengiriman' => $request->status_pengiriman,
            'feedback_produk' => $request->feedback_produk,
        ];

        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('orders.index')->withErrors($errors)->withInput($request->all());
        } else {
            $order->update($data);

            return redirect()->route('orders.index')
                ->with('success', 'Order berhasil diupdate.');
        }
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

    public function orderSelf()
    {
        $number = 1;
        $datas = Order::latest()->where('user_id', Auth::user()->id)->get();
        return view('pages.pesanan.self', compact('number', 'datas'));
    }

    public function addBuktiPembayaran(Request $request, Order $order)
    {
        $rules = array();
        
        // Ngambil gambar lama
        $oldPhoto = $order->getOriginal('bukti_pembayaran');

        // Check apakah ada gambar baru yg mau di update
        if($request->hasFile('bukti_pembayaran')){
            $image      = $request->file('bukti_pembayaran');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image);
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream(); // <-- Key point

            Storage::disk('local')->put('public'.'/'.$fileName, $img);
            $path = Storage::url($fileName);

            // Delete old image
            File::delete(public_path($oldPhoto));
        } else{
            $path = $oldPhoto;
        }

        $data = [
            'bukti_pembayaran' => $path,
            'status' => 'processing'
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();

            if(auth()->user()->peran != 'admin') {
                return redirect()->route('order.self')->withErrors($errors)->withInput($request->all());
            } else {
                return redirect()->route('orders.self')->withErrors($errors)->withInput($request->all());
            }
        } else{
            $order->update($data);

            if(auth()->user()->peran != 'admin') {
                return redirect()->route('order.self')
                    ->with('success', 'Bukti pembayaran berhasil ditambahkan.');
            } else {
                return redirect()->route('orders.index')
                    ->with('success', 'Bukti pembayaran berhasil ditambahkan.');
            }

        }
    }

    public function downloadBuktiPembayaran(Order $order)
    {
        $bukti_pembayaran = $order->getOriginal('bukti_pembayaran');
        // Get only filename without /storage/
        $filename = basename($bukti_pembayaran);

        // Download file
        // return response()->download($filename);
        return Storage::disk('public')->download($filename);
    }
}
