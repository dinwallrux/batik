@extends('layouts.mdbootstrap')

@section('content')

<!-- Main Navigation -->
<header class="md-bootstrap-header">

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container">

            <!-- Brand -->

            <div class="row w-100">
                <div class="col-4">
                    <!-- ***** Logo Start ***** -->
                    <a class="navbar-brand waves-effect" href="{{ route('home') }}">
                        {{-- <img src="{{ asset('argon') }}/img/brand/logo-batik.png" alt="" style="height: 50px !important;"> --}}
                        <strong class="brand-name">Yanto Batik</strong>
                    </a>
                    <!-- ***** Logo End ***** -->
                </div>
                <div class="col-8 d-flex align-items-center justify-content-end">
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li>
                            <a href="{{ route('home') }}/#welcome" class="active">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}/#about">Profil</a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}/#services">Produk</a>
                        </li>
                        <li>
                            <a href="{{ route('cart.index') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 16px;"></i>
                                <span class="badge badge-success" style="padding: 2px 2px 2px 4px;">
                                    @auth
                                        @if( session()->get('cart') != null )
                                            {{ $totalItem }}
                                        @else
                                            0
                                        @endif
                                    @else
                                        0
                                    @endauth
                                </span>
                            </a>
                        </li>
                        @auth
                            <li>
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ auth()->user()->name }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('orders.index') }}">
                                            <p>
                                                <i class="ion ion-md-paper"></i>
                                                Pesanan
                                            </p>
                                        </a>
                                        <a class="dropdown-item">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit">
                                                    <p>
                                                        <i class="ni ni-user-run"></i>
                                                        Logout
                                                    </p>
                                                </button>
                                            </form>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" type="submit">Login</a>
                            </li>
                        @endauth
                    </ul>
                    <!-- ***** Menu End ***** -->
                </div>
            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <div class="jumbotron color-grey-light mt-70 mb-7">
        <div class="d-flex align-items-center h-100">
            <div class="container text-center py-5">
                <h3 class="mb-0">Checkout</h3>
            </div>
        </div>
    </div>

</header>
<!-- Main Navigation -->

<!--Main layout-->
<main class="mt-5 pt-4">
    <div class="container wow fadeIn">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-8 mb-4">

                <!--Card-->
                <div class="card">

                    <!--Card content-->
                    <form class="card-body" method="post" action="{{ route('orders.store') }}">
                        @csrf

                        <input type="hidden" name="provinsi_asal" id="provinsi_asal" value="1">
                        <input type="hidden" name="kota_asal" id="kota_asal" value="114">
                        <input type="hidden" name="ongkir">
                        <input type="hidden" name="total" value="{{ $sumTotal }}">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">

                                <!--firstName-->
                                <div class="md-form ">
                                    <input type="text" name="fullname" id="fullname" class="form-control" value="{{ auth()->user()->name }}">
                                    <label for="firstName" class="">Nama Lengkap</label>
                                </div>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">

                                <!--email-->
                                <div class="md-form">
                                    <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}">
                                    <label for="email" class="">Email</label>
                                </div>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">

                                <div class="md-form">
                                    <select name="provinsi_tujuan" id="provinsi_tujuan" class="form-control" onchange="myEnvironment.setCity('provinsi_tujuan')" required>
                                        <option value="">Pilih Provinsi Tujuan</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province['province_id'] }}" data-nama-provinsi="{{ $province['province'] }}">{{ $province['province'] }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="shipping_state">
                                </div>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">

                                <div class="md-form">
                                    <select name="kota_tujuan" id="kota_tujuan" class="form-control" required>
                                        <option value="">Pilih Kota Tujuan</option>
                                    </select>
                                    <input type="hidden" name="shipping_city">
                                </div>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">

                                <div class="md-form">
                                    <select name="kurir" id="kurir" class="form-control" onchange="myEnvironment.setService('kota_asal', 'kota_tujuan', 'kurir')" required>
                                        <option value="">Pilih Kurir</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS INDONESIA</option>
                                    </select>
                                </div>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">

                                <div class="md-form">
                                    <select name="layanan" id="layanan" class="form-control" onchange="myEnvironment.setOngkirPrice('layanan')" required>
                                        <option value="">Pilih layanan</option>
                                    </select>
                                </div>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--address-->
                        <div class="md-form mb-5">
                            <input type="text" name="address" id="address" class="form-control">
                            <label for="address" class="">Alamat Detail</label>
                        </div>

                        <div class="md-form mb-5">
                            <input type="text" name="shipping_zipcode" id="shipping_zipcode" class="form-control">
                            <label for="shipping_zipcode" class="">Kode Pos</label>
                        </div>

                        <!--phone-->
                        <div class="md-form mb-5">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="" required>
                            <label for="phone" class="">Telepon</label>
                        </div>

                        <!--notes-->
                        <div class="mb-5">
                            <label for="notes" class="">Catatan</label>
                            <textarea name="notes" id="notes" class="form-control"></textarea>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                            Pesan Sekarang
                        </button>

                    </form>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4">

                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Cart</span>
                    <span class="badge badge-success badge-pill">{{ $totalItem }}</span>
                </h4>

                <!-- Cart -->
                <ul class="list-group mb-3 z-depth-1">
                    @if (session()->get('cart'))
                        @foreach ($carts as $cart)
                            @foreach ($cart as $colors)
                                @foreach ($colors as $type)
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">{{ $type['name'] }}</h6>
                                            <small class="text-muted">Panjang: {{ $type['quantity'] }} Meter</small>
                                        </div>
                                        <span class="text-muted">Rp @convert($type['price'] * $type['quantity'])</span>
                                    </li>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endif
                    <li id="ongkir-price" class="list-group-item d-flex justify-content-between">
                        <span>Ongkir</span>
                        <strong></strong>
                    </li>
                    <li id="total_price" class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong></strong>
                    </li>
                </ul>
                <!-- Cart -->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>
</main>
<!--Main layout-->

@endsection
