<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="icon" href="{{ asset('argon') }}/img/brand/logo-batik.png">

    <title>Yanto Batik</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('home')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('home')}}/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{asset('home')}}/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="{{asset('home')}}/css/owl-carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/my-style.css">
    <!-- Ionicons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

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
                        <a href="#" class="logo">Yanto Batik</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#welcome" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Profil</a></li>
                            <li class="scroll-to-section"><a href="#services">Produk</a></li>
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
                            @auth
                                <li class="scroll-to-section">
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
                                                    <button class="btn p-0" type="submit">
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
                                <li class="scroll-to-section">
                                    <a href="{{ route('login') }}" type="submit">Login</a>
                                </li>
                            @endauth
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
                        <h1>Beragam keindahan batik <strong>Indonesia</strong></h1>
                        <p>Cinta itu seperti batik yang dibuat dari banyak warna emosional, itu adalah kain yang pola dan kecerahannya mungkin berbeda-beda</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="{{asset('img')}}/art-illustration.svg" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
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
                        <h5>Profil Perusahaan</h5>
                    </div>
                    <ul>
                        <li>
                            <i class="ion ion-md-information-circle text-primary" style="font-size: 30px;"></i>
                            <div class="text">
                                <h6>Tentang kami</h6>
                                <p>{{ $profil->deskripsi }}</p>
                            </div>
                        </li>
                        <li>
                            <i class="ion ion-ios-flag text-primary" style="font-size: 30px;"></i>
                            <div class="text">
                                <h6>Alamat</h6>
                                <p>{{ $profil->alamat }}</p>
                            </div>
                        </li>
                        <li>
                            <i class="ion ion-ios-mail text-primary" style="font-size: 30px;"></i>
                            <div class="text">
                                <h6>Email</h6>
                                <p>{{ $profil->email }}</p>
                            </div>
                        </li>
                        <li>
                            <i class="ion ion-ios-call text-primary" style="font-size: 30px;"></i>
                            <div class="text">
                                <h6>Telepon</h6>
                                <p>{{ $profil->telepon }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="{{asset('argon')}}/img/brand/logo-batik.png" class="rounded img-fluid d-block mx-auto" alt="App">
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
                    @if ($product->tampilkan)
                        <div class="col-lg-4 text-center pb-4 mb-4">
                            <div class="service-item">
                                <div class="product-image">
                                    <img src="{{ asset( json_decode($product->foto)[0] ) }}" alt="">
                                </div>
                                <div class="title-price">
                                    <h5 class="service-title">{{$product->nama}}</h5>
                                    <p>Rp.@convert($product->harga)</p>
                                </div>
                                <div class="options">
                                    <p style="text-align: left;">{{ Str::limit($product->deskripsi, 200) }}</p>
                                </div>
                                <a href="{{ route('produk.detail', $product->id) }}" class="btn btn-primary main-button">Lihat Produk</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer style="padding: 10px; 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright mt-0">Copyright &copy; 2021 Batik</p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12"></div>
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
