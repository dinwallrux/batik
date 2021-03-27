@extends('layouts.app', ['title' => __('Ubah Obat')])

@section('content')
    @include('layouts.headers.main')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Ubah Obat') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-motif" action="{{ route('obat.update', $data->id) }}" enctype="multipart/form-data">
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
                                <div class="form-group row">
                                    <div class="col-lg-7">
                                        <label class="form-control-label" for="input-name">{{ __('Campuran Obat 1') }}</label>
                                        <select name="campuran_1" id="input-name" class="form-control form-control-alternative{{ $errors->has('campuran_1') ? ' is-invalid' : '' }}">
                                            @foreach ($lists as $item)
                                            <option {{ $item == $data->campuran_1 ? 'selected' : '' }} value="{{$item}}">{{$item}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('campuran_1'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('campuran_1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-5">
                                        <label class="form-control-label">{{ __('Takaran Obat') }}</label>
                                        <input type="text" name="takaran_1" id="input-takaran_1" class="form-control form-control-alternative{{ $errors->has('takaran_1') ? ' is-invalid' : '' }}" placeholder="{{ __('Takaran Obat') }}" value="{{ $data->takaran_1 }}" required autofocus>

                                        @if ($errors->has('takaran_1'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('takaran_1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-7">
                                        <label class="form-control-label" for="input-name">{{ __('Campuran Obat 2') }}</label>
                                        <select name="campuran_2" id="input-name" class="form-control form-control-alternative{{ $errors->has('campuran_2') ? ' is-invalid' : '' }}">
                                            @foreach ($lists as $item)
                                            <option {{ $item == $data->campuran_2 ? 'selected' : '' }} value="{{$item}}">{{$item}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('campuran_2'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('campuran_2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-5">
                                        <label class="form-control-label">{{ __('Takaran Obat') }}</label>
                                        <input type="text" name="takaran_2" id="input-takaran_2" class="form-control form-control-alternative{{ $errors->has('takaran_2') ? ' is-invalid' : '' }}" placeholder="{{ __('Takaran Obat') }}" value="{{ $data->takaran_2 }}" required autofocus>

                                        @if ($errors->has('takaran_2'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('takaran_2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-7">
                                        <label class="form-control-label" for="input-name">{{ __('Campuran Obat 3') }}</label>
                                        <select name="campuran_3" id="input-name" class="form-control form-control-alternative{{ $errors->has('campuran_3') ? ' is-invalid' : '' }}">
                                            @foreach ($lists as $item)
                                            <option {{ $item == $data->campuran_3 ? 'selected' : '' }} value="{{$item}}">{{$item}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('campuran_3'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('campuran_3') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-5">
                                        <label class="form-control-label">{{ __('Takaran Obat') }}</label>
                                        <input type="text" name="takaran_3" id="input-takaran_3" class="form-control form-control-alternative{{ $errors->has('takaran_3') ? ' is-invalid' : '' }}" placeholder="{{ __('Takaran Obat') }}" value="{{ $data->takaran_3 }}" required autofocus>

                                        @if ($errors->has('takaran_3'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('takaran_3') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Hasil Obat') }}</label>
                                        <input type="text" name="hasil" id="input-hasil" class="form-control form-control-alternative{{ $errors->has('hasil') ? ' is-invalid' : '' }}" placeholder="{{ __('Hasil Obat') }}" value="{{ $data->hasil }}" required autofocus>

                                        @if ($errors->has('hasil'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('hasil') }}</strong>
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