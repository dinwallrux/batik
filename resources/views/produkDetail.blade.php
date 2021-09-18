@extends('layouts.mdbootstrap')

@section('content')

<style>
    .view.main-img {
        width: 100%;
    }
    .view.view.main-img img {
        width: 100%;
    }

    .view.gallery-item {
        height: 142px;
    }
    .view.gallery-item img {
        width: 100%;
        object-fit: cover;
    }
</style>

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
                                            {{ count(session()->get('cart')) }}
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
                                        <a class="dropdown-item" href="{{ route('cart.index') }}">
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
                <h3 class="mb-0">Detail Produk</h3>
            </div>
        </div>
    </div>

</header>
<!-- Main Navigation -->

@foreach ($products as $product)
    <form action="{{ route('cart.add', [$product->id]) }}">
        @csrf
        <main>
            <div class="container">

                <!--Section: Block Content-->
                <section class="mb-5">

                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-0">

                            <div id="mdb-lightbox-ui"></div>

                            <div class="mdb-lightbox">

                                <div class="row product-gallery mx-1">

                                    <div class="col-12 mb-0">
                                        <figure class="view overlay rounded z-depth-1 main-img">
                                            <a href="{{ asset( json_decode($product->foto)[0] ) }}"
                                                data-size="710x823">
                                                <img src="{{ asset( json_decode($product->foto)[0] ) }}"
                                                    class="img-fluid z-depth-1">
                                            </a>
                                        </figure>
                                        <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
                                            <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                                                data-size="710x823">
                                                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                                                    class="img-fluid z-depth-1">
                                            </a>
                                        </figure>
                                        <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
                                            <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg"
                                                data-size="710x823">
                                                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg"
                                                    class="img-fluid z-depth-1">
                                            </a>
                                        </figure>
                                        <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
                                            <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                                                data-size="710x823">
                                                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                                                    class="img-fluid z-depth-1">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            @if (json_decode($product->foto) !== null)
                                                @foreach (json_decode($product->foto) as $foto)
                                                    <div class="col-3">
                                                        <div class="view overlay rounded z-depth-1 gallery-item">
                                                            <img src="{{asset($foto)}}"
                                                                class="img-fluid">
                                                            <div class="mask rgba-white-slight"></div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-6">

                            <h5>{{ $product->nama }}</h5>
                            {{-- <p class="mb-2 text-muted text-uppercase small">Shirts</p> --}}
                            <p><span class="mr-1"><strong>Rp.@convert($product->harga)</strong></span></p>
                            <p class="pt-1">{{ $product->deskripsi }}</p>
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <th class="pl-0 w-25" scope="row"><strong>Jenis</strong></th>
                                            <td>
                                                <select name="jenis_kain" class="form-control mb-2">
                                                    <option value="Rayon">Rayon</option>
                                                    <option value="Rayon crinkle">Rayon crinkle</option>
                                                    <option value="Rayon voile">Rayon voile</option>
                                                    <option value="Blacu">Blacu</option>
                                                    <option value="Katun prima">Katun prima</option>
                                                    <option value="Katun primisima">Katun primisima</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0 w-25" scope="row"><strong>Warna</strong></th>
                                            <td>
                                                <select name="color" class="form-control mb-2">
                                                    @foreach ($product->obat as $color)
                                                    <option value="{{ $color->id }}">{{ $color->hasil }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="table-responsive mb-2">
                                <table class="table table-sm table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 pb-0 w-25"><b>Panjang</b></td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="def-number-input number-input safari_only mb-0">
                                                        <button
                                                            type="button"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                            class="minus"></button>
                                                        <input class="quantity" min="0" name="quantity" value="1" type="number">
                                                        <button
                                                            type="button"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                            class="plus"></button>
                                                    </div>
                                                    <span class="ml-2"><b>Meter</b></span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md mr-1 mb-2">Beli</button>
                        </div>
                    </div>

                </section>
                <!--Section: Block Content-->

            </div>
        </main>
    </form>
@endforeach

<script src="https://mdbootstrap.com/previews/ecommerce-demo/js/jquery-3.4.1.min.js"></script>
<script src="https://mdbootstrap.com/previews/ecommerce-demo/js/mdb.min.js"></script>
<script src="https://mdbootstrap.com/previews/ecommerce-demo/js/mdb.ecommerce.min.js"></script>
{{-- <script type="text/javascript" src="{{ asset('mdbootstrap/ecommerce/jquery-3.4.1.min') }}"></script>
<script type="text/javascript" src="{{ asset('mdbootstrap/ecommerce/mdb.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('mdbootstrap/ecommerce/mdb.ecommerce.min.js') }}"></script> --}}
<script>
    $(document).ready(function () {
        // MDB Lightbox Init
        $(function () {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
    });

</script>

@endsection
