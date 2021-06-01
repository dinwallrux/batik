@extends('layouts.app', ['title' => __('Ubah Pesanan')])

@section('content')
    @include('layouts.headers.main')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Detail Order') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="detail-order">
                            <div class="order">
                                <h3>Informasi Order</h3>
                                <p>No. Order: {{ $orderDetail->order_number }}</p>
                                <p>Status Order: {{ $orderDetail->status }}</p>
                                <p>Jumlah Produk: {{ $orderDetail->item_count }}</p>
                                <p>Total: {{ $orderDetail->grand_total }}</p>
                            </div>
                            <div class="address">
                                <h3>Informasi Pemesan</h3>
                                <p>{{ $orderDetail->shipping_address }}</p>
                                <p>{{ $orderDetail->shipping_city }}</p>
                                <p>{{ $orderDetail->shipping_state }}</p>
                                <p>{{ $orderDetail->shipping_zipcode }}</p>
                                <p>{{ $orderDetail->shipping_phone }}</p>
                                <p>{{ $orderDetail->shipping_email }}</p>
                            </div>
                        </div>
                        <table class="table table-detail-order">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderDetail->items as $product)
                                <tr>
                                    <td>
                                        <div class="product">
                                            <img src="{{asset($product->gambar)}}" alt="">
                                            <p>{{ $product->nama }} - {{ App\Obat::where('id', $product->pivot->obat_id)->get()->first()['hasil'] }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $product->pivot->quantity }}
                                    </td>
                                    <td>
                                        Rp.@convert($product->pivot->price * $product->pivot->quantity)
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
