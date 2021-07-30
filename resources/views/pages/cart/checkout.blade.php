@extends('layouts.mdbootstrap')

@section('content')
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
            <img src="{{ asset('argon') }}/img/brand/logo-batik.png" alt="" style="height: 50px !important;">
            <strong class="blue-text">Yanto Batik</strong>
        </a>

    </div>
</nav>
<!-- Navbar -->

<!--Main layout-->
<main class="mt-5 pt-4">
    <div class="container wow fadeIn">

        <!-- Heading -->
        <h2 class="my-5 h2 text-center">Checkout</h2>

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-8 mb-4">

                <!--Card-->
                <div class="card">

                    <!--Card content-->
                    <form class="card-body" method="post" action="{{ route('orders.store') }}">
                        @csrf

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">

                                <!--firstName-->
                                <div class="md-form ">
                                    <input type="text" name="fullname" id="fullname" class="form-control">
                                    <label for="firstName" class="">Nama Lengkap</label>
                                </div>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">

                                <!--email-->
                                <div class="md-form">
                                    <input type="text" name="email" id="email" class="form-control">
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
                                    <input type="text" class="form-control" name="city" id="city" placeholder="" required>
                                    <label for="city" class="">Kota</label>
                                </div>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">

                                <div class="md-form">
                                    <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="" required>
                                    <label for="zipcode" class="">Kode pos</label>
                                </div>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--address-->
                        <div class="md-form mb-5">
                            <input type="text" name="address" id="address" class="form-control">
                            <label for="address" class="">Alamat</label>
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
                    <span class="badge badge-secondary badge-pill">{{count(session()->get('cart'))}}</span>
                </h4>

                <!-- Cart -->
                <ul class="list-group mb-3 z-depth-1">
                    @foreach ($carts as $cart)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $cart['name'] }}</h6>
                            <small class="text-muted">Panjang: {{ $cart['quantity'] }} Meter</small>
                        </div>
                        <span class="text-muted">Rp.@convert($cart['price'] * $cart['quantity'])</span>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>Rp.@convert($sumTotal)</strong>
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
