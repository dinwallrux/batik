@extends('layouts.app', ['title' => __('Tambah Produk')])

@section('content')
    @include('layouts.headers.main')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Tambah Produk') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-produk" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="form-control-label" for="input-name">{{ __('Nama Produk') }}</label>
                                        <input type="text" name="nama" id="input-name" class="form-control form-control-alternative{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Produk') }}" required autofocus>

                                        @if ($errors->has('nama'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-control-label" for="input-harga">{{ __('Harga') }}</label>
                                        <input type="number" name="harga" id="input-harga" class="form-control form-control-alternative{{ $errors->has('harga') ? ' is-invalid' : '' }}" placeholder="{{ __('Harga') }}" required autofocus>

                                        @if ($errors->has('harga'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('harga') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-gambar form-group{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Gambar') }}</label>
                                    <input type="file" onchange="myEnvironment.imgPreview('#input_produk', '#produk_preview')" name="gambar" id="input_produk" class="hide form-control form-control-alternative{{ $errors->has('gambar') ? ' is-invalid' : '' }}" placeholder="{{ __('Gambar') }}" required>
                                    <label for="input_produk" class="label-file form-control form-control-alternative{{ $errors->has('gambar') ? ' is-invalid' : '' }}">
                                        <i class="ion ion-md-cloud-upload"></i>
                                        <img src="" id="produk_preview" alt="">
                                    </label>

                                    @if ($errors->has('gambar'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gambar') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <select name="warna[]" class="selectpicker full-width" data-none-selected-text="Pilih Warna" data-none-results-text="Pencarian tidak ditemukan" data-style="btn" multiple data-live-search="true">
                                            @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->hasil }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Simpan') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection