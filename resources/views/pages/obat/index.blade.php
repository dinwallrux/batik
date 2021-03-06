@extends('layouts.app', ['title' => __('Obat')])

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
                                    <h3 class="mb-0">Komposisi Obat Warna</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('obat.create') }}" class="btn btn-sm btn-primary">Tambah</a>
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
                                        <th scope="col">Campuran Obat 1</th>
                                        <th scope="col">Campuran Obat 2</th>
                                        <th scope="col">Campuran Obat 3</th>
                                        <th scope="col">Hasil</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $number++ }}</td>
                                        <td>{{ $data->campuran_1 }} ({{ $data->takaran_1 }})</td>
                                        <td>{{ $data->campuran_2 }} ({{ $data->takaran_2 }})</td>
                                        <td>{{ $data->campuran_3 }} ({{ $data->takaran_3 }})</td>
                                        <td>{{ $data->hasil }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('obat.edit', $data->id) }}">Edit</a>
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