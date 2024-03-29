@extends('layouts.app', ['title' => __('Ubah Stock Bahan Baku')])

@section('content')
    @include('layouts.headers.main')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Ubah Stock Bahan Baku') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-bahan" action="{{ route('stock.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nama Alat') }}</label>
                                    <input type="text" name="nama" id="input-name" class="form-control form-control-alternative{{ $errors->has('nama') ? ' is-invalid' : '' }}" value="{{ $data->nama }}" placeholder="{{ __('Nama Alat') }}" required autofocus>

                                    @if ($errors->has('nama'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Stock') }}</label>
                                    <input type="number" name="stock" id="input-stock" class="form-control form-control-alternative{{ $errors->has('stock') ? ' is-invalid' : '' }}" value="{{ $data->stock }}" placeholder="{{ __('0') }}" required autofocus>

                                    @if ($errors->has('stock'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('stock') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('jenis') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Stock') }}</label>
                                    <select name="jenis" id="input-jenis" class="form-control form-control-alternative{{ $errors->has('jenis') ? ' is-invalid' : '' }}">
                                        <option value="kain" {{ $data->jenis == 'kain' ? 'selected' : '' }}>Kain</option>
                                        <option value="obat" {{ $data->jenis == 'obat' ? 'selected' : '' }}>Obat</option>
                                    </select>

                                    @if ($errors->has('jenis'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jenis') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Ubah') }}</button>
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