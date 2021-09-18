@extends('layouts.app', ['title' => __('Ubah Profil')])

@section('content')
    @include('layouts.headers.main')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Ubah Profil') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-bahan" action="{{ route('profil.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('deskripsi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Tentang kami') }}</label>
                                    <textarea rows="10" name="deskripsi" id="deskripsi" class="form-control form-control-alternative{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" placeholder="Tentang kami">{{ $data->deskripsi }}</textarea>

                                    @if ($errors->has('deskripsi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('deskripsi') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Alamat') }}</label>
                                    <input type="text" name="alamat" id="input-name" class="form-control form-control-alternative{{ $errors->has('alamat') ? ' is-invalid' : '' }}" value="{{ $data->alamat }}" placeholder="{{ __('Alamat') }}" required autofocus>

                                    @if ($errors->has('alamat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('alamat') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-name" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $data->email }}" placeholder="{{ __('Email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('telepon') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Telepon') }}</label>
                                    <input type="number" name="telepon" id="input-name" class="form-control form-control-alternative{{ $errors->has('telepon') ? ' is-invalid' : '' }}" value="{{ $data->telepon }}" placeholder="{{ __('Telepon') }}" required autofocus>

                                    @if ($errors->has('telepon'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Ubah') }}</button>
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
