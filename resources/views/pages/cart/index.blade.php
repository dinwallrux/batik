@extends('layouts.mdbootstrap')

@section('content')
<header>
    <div class="jumbotron color-grey-light mt-70">
        <div class="d-flex align-items-center h-100">
            <div class="container text-center py-5">
                <h3 class="mb-0">Shopping cart</h3>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="container">

        <!--Section: Block Content-->
        <section class="mt-5 mb-4">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-lg-8">

                    <!-- Card -->
                    <div class="card wish-list mb-4">
                        <div class="card-body">

                            <h5 class="mb-4">Cart (<span>{{\Cart::session(auth()->id())->getContent()->count()}}</span> items)</h5>
                            @foreach ($carts as $cart)
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100"
                                            src="{{ asset($cart['image']) }}"
                                            alt="Sample">
                                        <a href="#!">
                                            <div class="mask waves-effect waves-light">
                                                <img class="img-fluid w-100"
                                                    src="{{ asset($cart['image']) }}">
                                                <div class="mask rgba-black-slight waves-effect waves-light"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5>{{ $cart['name'] }}</h5>
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <label class="form-control-label" for="input-harga">{{ __('Warna') }}</label>
                                                        {{ $color->hasil }}
                                                    </div>
                                                </div>
                                                <p class="mb-3 text-muted text-uppercase small">Size: M</p>
                                            </div>
                                            <div>
                                                <form action="{{ route('cart.update', $cart['id']) }}">
                                                    <div class="def-number-input number-input safari_only mb-0 w-100">
                                                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                        <input class="quantity" min="0" name="quantity" value="{{ $cart['quantity'] }}" type="number">
                                                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                                    </div>
                                                    <input type="submit" class="btn btn-success mt-2" value="Update">
                                                </form>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <form action="{{ route('cart.delete', $cart['id']) }}">
                                                    <button type="submit" class="card-link-secondary small text-uppercase mr-3" style="outline: none; border: none; background-color: transparent;">
                                                        <i class="fas fa-trash-alt mr-1"></i> Remove item
                                                    </button>
                                                </form>
                                            </div>
                                            <p class="mb-0"><span><strong>Rp.@convert($cart['price'])</strong></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            @endforeach

                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4">

                    <!-- Card -->
                    <div class="card mb-4">
                        <div class="card-body">

                            <h5 class="mb-3">The total amount of</h5>

                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Temporary amount
                                    <span>$53.98</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span>Gratis</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>The total amount of</strong>
                                        <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong>
                                    </div>
                                    <span><strong>Rp.@convert($sumTotal)</strong></span>
                                </li>
                            </ul>

                            <a href="{{ route('checkout') }}" class="btn btn-primary btn-block waves-effect waves-light">
                                go to checkout
                            </a>

                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Block Content-->

    </div>
</main>
@endsection
