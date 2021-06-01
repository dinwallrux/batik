@extends('layouts.app', ['title' => __('Ubah Pesanan')])

@section('content')
    @include('layouts.headers.main')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Ubah Pesanan') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-order" action="{{ route('orders.update', $order->id) }}" enctype="multipart/form-data">
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
                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Status') }}</label>
                                    <select name="status" class="form-control form-control-alternative{{ $errors->has('status') ? ' is-invalid' : '' }}">
                                        <option {{ $order->status == "pending" ? 'selected' : '' }} value="pending">Pending</option>
                                        <option {{ $order->status == "processing" ? 'selected' : '' }} value="processing">Processing</option>
                                        <option {{ $order->status == "completed" ? 'selected' : '' }} value="completed">Completed</option>
                                        <option {{ $order->status == "decline" ? 'selected' : '' }} value="decline">Decline</option>
                                    </select>

                                    @if ($errors->has('nama'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
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
