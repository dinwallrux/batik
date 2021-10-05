@extends('layouts.app', ['title' => __('Yanto Batik')])

@section('content')
    @include('layouts.headers.main')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center justify-content-between">
                            <h3 class="col-6 mb-0">{{ $produk->nama }}</h3>
                            <h3 class="col-6 mb-0 text-right">Rp @convert($produk->harga)</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-control-label" for="input-name">Foto Produk</label>
                                <ul class="list-photo">
                                    @if ( is_array(json_decode($produk['foto'])) && json_decode($produk['foto']) !== null )
                                        @foreach (json_decode($produk['foto']) as $foto)
                                            <li>
                                                <img src="{{ asset( $foto ) }}" alt="">
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-control-label" for="input-name">Deskripsi Produk</label>
                                <p>{{ $produk->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
