@extends('layouts.app', ['title' => __('Profil')])

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
                                    <h2 class="mb-0">Profil Perusahaan</h2>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('profil.edit', $data->id) }}" class="btn btn-sm btn-success">edit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 p-4">
                            <div class="row">
                                <div class="col-10">
                                    <div class="label-title d-flex align-items-center">
                                        <i class="ion ion-md-information-circle mr-2"></i>
                                        <h3 class="mb-0">Tentang kami</h3>
                                    </div>
                                    <p>{{ $data->deskripsi }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-10">
                                    <div class="label-title d-flex align-items-center">
                                        <i class="ion ion-ios-flag mr-2"></i>
                                        <h3 class="mb-0">Alamat</h3>
                                    </div>
                                    <p>{{ $data->alamat }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="label-title d-flex align-items-center">
                                        <i class="ion ion-ios-mail mr-2"></i>
                                        <h3 class="mb-0">Email</h3>
                                    </div>
                                    <p>{{ $data->email }}</p>
                                </div>
                                <div class="col-6">
                                    <div class="label-title d-flex align-items-center">
                                        <i class="ion ion-ios-call mr-2"></i>
                                        <h3 class="mb-0">Telepon</h3>
                                    </div>
                                    <p>{{ $data->telepon }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.footers.auth')
        </div>
    </div>
@endsection
