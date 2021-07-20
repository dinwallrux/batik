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
                                    <th>Warna</th>
                                    <th>Jenis Kain</th>
                                    <th>Panjang</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderDetail->items as $product)
                                <tr>
                                    <td>
                                        <div class="product">
                                            <img src="{{ asset(json_decode($product->foto)[0]) }}" alt="">
                                            <p>{{ $product->nama }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{ App\Obat::where('id', $product->pivot->obat_id)->get()->first()['hasil'] }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $product->pivot->jenis_kain }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $product->pivot->panjang }} Meter</p>
                                    </td>
                                    <td>
                                        <p>{{ $product->pivot->quantity }}</p>
                                    </td>
                                    <td>
                                        <p>Rp.@convert($product->pivot->price * $product->pivot->quantity)</p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <form method="post" class="form-bukti-pembayaran" action="{{ route('bukti_pembayaran', $orderDetail->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-gambar form-group{{ $errors->has('bukti_pembayaran') ? ' has-danger' : '' }}">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <label class="form-control-label mb-0">{{ __('Bukti Pembayaran') }}</label>
                                    @if( auth()->user()->peran != 'pembeli' )
                                        <a href="{{ route('bukti_pembayaran.download', $orderDetail->id) }}" class="btn btn-primary btn-sm">
                                            Download Bukti Pembayaran
                                        </a>
                                    @endif
                                </div>

                                <div class="label-file form-control form-control-alternative">
                                    <img src="{{ asset($orderDetail->bukti_pembayaran) }}" alt="">
                                </div>

                                @if( auth()->user()->peran != 'admin' )
                                    <input type="file" onchange="myEnvironment.imgPreview('#input_produk', '#bukti_pembayaran_preview')" name="bukti_pembayaran" id="input_produk" class="hide form-control form-control-alternative{{ $errors->has('bukti_pembayaran') ? ' is-invalid' : '' }}" placeholder="{{ __('Bukti Pembayaran') }}">
                                    <label for="input_produk" class="label-file form-control form-control-alternative{{ $errors->has('bukti_pembayaran') ? ' is-invalid' : '' }}">
                                        @if ($orderDetail->bukti_pembayaran == null)
                                            <i class="ion ion-md-cloud-upload"></i>
                                        @endif
                                        <img src="{{ asset($orderDetail->bukti_pembayaran) }}" id="bukti_pembayaran_preview" alt="">
                                    </label>

                                    @if ($errors->has('gambar'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gambar') }}</strong>
                                        </span>
                                    @endif
                                @endif
                            </div>

                            @if( auth()->user()->peran != 'admin' )
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Kirim') }}</button>
                                </div>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
