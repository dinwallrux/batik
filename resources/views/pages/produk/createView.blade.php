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
                                <div class="form-gambar form-group{{ $errors->has('foto') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Foto') }}</label>
                                    <input type="file" onchange="myEnvironment.multipleImgPreview('#input_produk', '.list-file')" name="foto[]" id="input_produk" class="hide form-control form-control-alternative{{ $errors->has('foto') ? ' is-invalid' : '' }}" placeholder="{{ __('Foto') }}" required multiple>
                                    <label for="input_produk" id="produk_preview" class="label-file form-control form-control-alternative{{ $errors->has('foto') ? ' is-invalid' : '' }}">
                                        <div class="btn btn-primary btn-sm m-2 d-inline-flex align-items-center">
                                            <i class="ion ion-md-images" style="font-size: 20px; margin-right: 5px;"></i>
                                            <span>Tambah Foto</span>
                                        </div>
                                    </label>
                                    <div class="list-file d-flex"></div>

                                    @if ($errors->has('foto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('foto') }}</strong>
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

                                <div class="form-group{{ $errors->has('deskripsi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Deskripsi') }}</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control form-control-alternative{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" placeholder="Deskripsi"></textarea>

                                    @if ($errors->has('deskripsi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('deskripsi') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="custom-control custom-checkbox mb-3 d-flex align-items-center">
                                    <input class="custom-control-input" id="tampilkan" name="tampilkan" type="checkbox">
                                    <label class="custom-control-label" for="tampilkan">Tampilkan</label>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Simpan') }}</button>
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