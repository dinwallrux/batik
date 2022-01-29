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
                                <p><b>No. Order</b>: {{ $orderDetail->order_number }}</p>
                                <p><b>Kurir</b>: {{ $orderDetail->kurir }}</p>
                                <p><b>Layanan</b>: {{ $orderDetail->layanan }}</p>
                                <p><b>Status Order</b>: {{ $orderDetail->status }}</p>
                                <p><b>Jumlah Produk</b>: {{ $orderDetail->item_count }}</p>
                            </div>
                            <div class="address">
                                <h3>Informasi Pemesan</h3>
                                <p>{{ $orderDetail->shipping_fullname }}</p>
                                <p>{{ $orderDetail->shipping_email }}</p>
                                <p>{{ $orderDetail->shipping_phone }}</p>
                                <p>{{ $orderDetail->shipping_address }}</p>
                                <p>{{ $orderDetail->shipping_city }}</p>
                                <p>{{ $orderDetail->shipping_state }}</p>
                                <p>{{ $orderDetail->shipping_zipcode }}</p>
                            </div>
                        </div>
                        <br>
                        <div class="detail-order">
                            <p><b>Proses pengerjaan produk yang diorder maksimal paling lambat 7 hari</b></p>
                        </div>
                        <table class="table table-detail-order">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Warna</th>
                                    <th>Jenis Kain</th>
                                    <th>Panjang</th>
                                    <th>Sub Total</th>
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
                                        <p>{{ $product->pivot->quantity }} Meter</p>
                                    </td>
                                    <td>
                                        <p>Rp @convert($product->pivot->price * $product->pivot->quantity)</p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><b>Ongkir</b></td>
                                    <td><p>Rp @convert($orderDetail->ongkir)</p></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><b>Total</b></td>
                                    <td><p>Rp @convert($orderDetail->grand_total)</p></td>
                                </tr>
                            </tfoot>
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

                        <div class="feedback">
                            <label class="form-control-label">Feedback Produk</label>
                            <div class="feedback-text card p-3">
                                <p>{{ $orderDetail->feedback_produk }}</p>
                                <small class="text-right">{{ $orderDetail->updated_at }}</small>
                                @if (!is_null($id_notification))
                                <div style="display: flex; justify-content: flex-end;">
                                    <a href="{{ route('markAsRead', $id_notification) }}" class="btn btn-primary btn-sm mt-3" style="width: 170px;">Tandai sudah dibaca</a>
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
