@extends('layouts.mdbootstrap')

@section('content')
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
            <strong class="blue-text">MDB</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link waves-effect" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About
                        MDB</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect"
                        href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank">Free
                        download</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/"
                        target="_blank">Free tutorials</a>
                </li>
            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link waves-effect">
                        <span class="badge red z-depth-1 mr-1"> 1 </span>
                        <i class="fas fa-shopping-cart"></i>
                        <span class="clearfix d-none d-sm-inline-block"> Cart </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/mdbootstrap/bootstrap-material-design"
                        class="nav-link border border-light rounded waves-effect" target="_blank">
                        <i class="fab fa-github mr-2"></i>MDB GitHub
                    </a>
                </li>
            </ul>

        </div>

    </div>
</nav>
<!-- Navbar -->

<!--Main layout-->
<main class="mt-5 pt-4">
    <div class="container wow fadeIn">

        <!-- Heading -->
        <h2 class="my-5 h2 text-center">Checkout form</h2>

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
                            Continue to checkout
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
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{\Cart::session(auth()->id())->getContent()->count()}}</span>
                </h4>

                <!-- Cart -->
                <ul class="list-group mb-3 z-depth-1">
                    @foreach ($cartItems as $item)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $item->name }}</h6>
                            <small class="text-muted">Qty: {{ $item->quantity }}</small>
                        </div>
                        <span class="text-muted">Rp.@convert(\Cart::session(auth()->id())->get($item->id)->getPriceSum())</span>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>Rp.@convert(\Cart::session(auth()->id())->getTotal())</strong>
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