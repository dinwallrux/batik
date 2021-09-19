<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">{{ __('Yanto Batik') }}</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item">
                <a class="nav-link pr-0" href="{{ route('home') }}">
                    <div class="media align-items-center">
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">Home</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pr-0" href="{{ route('home') }}/#about">
                    <div class="media align-items-center">
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">Profil</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pr-0" href="{{ route('home') }}/#services">
                    <div class="media align-items-center">
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">Produk</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pr-0" href="{{ route('cart.index') }}">
                    <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 16px;"></i>
                    <span class="badge badge-success" style="background-color: #fff;">
                        @auth
                            @if( session()->get('cart') != null )
                                <?php $totalItem = 0; ?>
                                @foreach (session()->get('cart') as $cart)
                                    @foreach ($cart as $color)
                                        <?php $totalItem += count($color) ?>
                                    @endforeach
                                @endforeach
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
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
