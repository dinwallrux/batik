@extends('layouts.app', ['title' => __('Pesanan')])

@section('content')
    @include('layouts.headers.main')

    <div class="main-content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Pesanan</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                        </div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal Order</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Total</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $number++ }}</td>
                                        <td>{{ $data->order_number }}</td>
                                        <td>{{ $data->shipping_fullname }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            @if ($data->status == 'pending')
                                                <span class="text-warning">
                                                    {{ $data->status }}
                                                </span>
                                            @elseif ($data->status == 'processing')
                                                <span class="text-primary">
                                                    {{ $data->status }}
                                                </span>
                                            @elseif ($data->status == 'decline')
                                                <span class="text-danger">
                                                    {{ $data->status }}
                                                </span>
                                            @elseif ($data->status == 'completed')
                                                <span class="text-success">
                                                    {{ $data->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $data->shipping_address }}</td>
                                        <td>Rp.@convert($data->grand_total)</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('orders.edit', $data->id) }}">Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">

                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.footers.auth')
        </div>
    </div>
@endsection