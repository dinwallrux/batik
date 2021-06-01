<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>Batik</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('home')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('home')}}/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{asset('home')}}/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="{{asset('home')}}/css/owl-carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/my-style.css">

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">Batik</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#welcome" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Profil</a></li>
                            <li class="scroll-to-section"><a href="#services">Produk</a></li>
                            @auth
                                <li class="scroll-to-section">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn p-0" type="submit">
                                            <a>Logout</a>
                                        </button>
                                    </form>
                                </li>
                            @else
                                <li class="scroll-to-section">
                                    <a href="{{ route('login') }}" type="submit">Login</a>
                                </li>
                            @endauth
                            <li class="scroll-to-section">
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
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1>Art Factory is free <strong>for YOU</strong></h1>
                        <p>This template is available for 100% free of charge on TemplateMo. Download, modify and use this for your business website.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="{{asset('home')}}/images/slider-icon.png" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix">
                    <div class="left-heading">
                        <h5>Curabitur aliquam eget tellus id porta</h5>
                    </div>
                    <p>Proin justo sapien, posuere suscipit tortor in, fermentum mattis elit. Aenean in feugiat purus.</p>
                    <ul>
                        <li>
                            <img src="{{asset('home')}}/images/about-icon-01.png" alt="">
                            <div class="text">
                                <h6>Nulla ultricies risus quis risus</h6>
                                <p>You can use this website template for commercial or non-commercial purposes.</p>
                            </div>
                        </li>
                        <li>
                            <img src="{{asset('home')}}/images/about-icon-02.png" alt="">
                            <div class="text">
                                <h6>Donec consequat commodo purus</h6>
                                <p>You have no right to re-distribute this template as a downloadable ZIP file on any website.</p>
                            </div>
                        </li>
                        <li>
                            <img src="{{asset('home')}}/images/about-icon-03.png" alt="">
                            <div class="text">
                                <h6>Sed placerat sollicitudin mauris</h6>
                                <p>If you have any question or comment, please <a rel="nofollow" href="https://templatemo.com/contact">contact</a> us on TemplateMo.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="{{asset('home')}}/images/right-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Features Small Start ***** -->
    <section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center text-white">Produk</h2>
                </div>
            </div>
            <div class="row pt-5">
                @foreach ($products as $product)
                <form class="col-lg-4 text-center pb-4 mb-4" action="{{ route('cart.add', [$product->id]) }}">
                    @csrf
                    <div class="service-item">
                        <div class="product-image">
                            <img src="{{asset($product->gambar)}}" alt="">
                        </div>
                        <div class="title-price">
                            <h5 class="service-title">{{$product->nama}}</h5>
                            <p>Rp.@convert($product->harga)</p>
                        </div>
                        <div class="options">
                            <select name="color" class="form-control mb-2">
                                @foreach ($product->obat as $color)
                                <option value="{{ $color->id }}">{{ $color->hasil }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary main-button">Beli</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2021 Batik</p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{asset('home')}}/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="{{asset('home')}}/js/popper.js"></script>
    <script src="{{asset('home')}}/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="{{asset('home')}}/js/owl-carousel.js"></script>
    <script src="{{asset('home')}}/js/scrollreveal.min.js"></script>
    <script src="{{asset('home')}}/js/waypoints.min.js"></script>
    <script src="{{asset('home')}}/js/jquery.counterup.min.js"></script>
    <script src="{{asset('home')}}/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="{{asset('home')}}/js/custom.js"></script>
    <script src="{{asset('js')}}/my-script.js"></script>

  </body>
</html>
