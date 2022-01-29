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
            @if( auth()->user()->peran == 'admin' )
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                    <span class="badge badge-success" style="background-color: #fff;">{{ count(App\User::find(1)->unreadNotifications) }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                    <!-- Dropdown header -->
                    <div class="px-3 py-3">
                        <h6 class="text-sm text-muted m-0">Anda memiliki <strong class="text-primary">{{ count(App\User::find(1)->unreadNotifications) }}</strong> feedback produk</h6>
                    </div>
                    <!-- List group -->
                    <div class="list-group list-group-flush">
                        @foreach (App\User::find(1)->unreadNotifications  as $notification)
                        <a href="{{ route('order.self.view', $notification->data['order_id']) . '?id_notification=' . $notification->id }}" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0 text-sm">{{ App\User::find($notification->data['nama_pembeli'])['name'] }}</h4>
                                        </div>
                                        <div class="text-right text-muted">
                                            <small>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->updated_at)->isoFormat('dddd, D-MM-Y') }}</small>
                                        </div>
                                    </div>
                                    <p class="text-sm mb-0">{{ $notification->data['feedback_produk'] }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </li>
            @endif
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
