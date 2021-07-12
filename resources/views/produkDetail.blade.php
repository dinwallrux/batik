@extends('layouts.mdbootstrap')

@section('content')
<!-- Main Navigation -->
<header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="{{ route('home') }}">
                <img src="{{ asset('argon') }}/img/brand/logo-batik.png" alt="" style="height: 50px !important;">
                <strong class="blue-text">Yanto Batik</strong>
            </a>

        </div>
    </nav>
    <!-- Navbar -->

    <div class="jumbotron color-grey-light mt-70">
        <div class="d-flex align-items-center h-100">
            <div class="container text-center py-5">
                <h3 class="mb-0">Detail Produk</h3>
            </div>
        </div>
    </div>

</header>
<!-- Main Navigation -->

@foreach ($products as $product)
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
                                    <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
                                        data-size="710x823">
                                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
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
                                    <div class="col-3">
                                        <div class="view overlay rounded z-depth-1 gallery-item">
                                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg"
                                                class="img-fluid">
                                            <div class="mask rgba-white-slight"></div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="view overlay rounded z-depth-1 gallery-item">
                                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
                                                class="img-fluid">
                                            <div class="mask rgba-white-slight"></div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="view overlay rounded z-depth-1 gallery-item">
                                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                                                class="img-fluid">
                                            <div class="mask rgba-white-slight"></div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="view overlay rounded z-depth-1 gallery-item">
                                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                                                class="img-fluid">
                                            <div class="mask rgba-white-slight"></div>
                                        </div>
                                    </div>
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
                                    <td>Katun</td>
                                </tr>
                                <tr>
                                    <th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
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
                                    <td class="pl-0 pb-0 w-25">Quantity</td>
                                    <td class="pb-0">Select size</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">
                                        <div class="def-number-input number-input safari_only mb-0">
                                            <button
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                class="minus"></button>
                                            <input class="quantity" min="0" name="quantity" value="1" type="number">
                                            <button
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                class="plus"></button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mt-1">
                                            <div class="form-check form-check-inline pl-0">
                                                <input type="radio" class="form-check-input" id="small"
                                                    name="materialExampleRadios" checked>
                                                <label class="form-check-label small text-uppercase card-link-secondary"
                                                    for="small">Small</label>
                                            </div>
                                            <div class="form-check form-check-inline pl-0">
                                                <input type="radio" class="form-check-input" id="medium"
                                                    name="materialExampleRadios">
                                                <label class="form-check-label small text-uppercase card-link-secondary"
                                                    for="medium">Medium</label>
                                            </div>
                                            <div class="form-check form-check-inline pl-0">
                                                <input type="radio" class="form-check-input" id="large"
                                                    name="materialExampleRadios">
                                                <label class="form-check-label small text-uppercase card-link-secondary"
                                                    for="large">Large</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Buy now</button>
                    <button type="button" class="btn btn-light btn-md mr-1 mb-2"><i
                            class="fas fa-shopping-cart pr-2"></i>Add to cart</button>
                </div>
            </div>

        </section>
        <!--Section: Block Content-->

    </div>
</main>
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
