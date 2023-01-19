<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="EasyTrip merupakan sebuah aplikasi untuk memesan tiket tempat wisata yang ada di Indonesia.">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'EasyTrip')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/navbar.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .navbar{
            transition: 0.5s top ease-in-out;
        }

        .nav-link.active,
        .nav-link:hover{
            color: #FF9F1C !important;
        }

        .btn-outline-secondary:hover{
            color: white !important;
        }

        .playfair{
            font-family: 'Playfair Display', serif;!important
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('images/web-logo.png')}}" alt="Nav Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link {{Route::currentRouteName() === 'home' ? "active" : ""}}">{{__('Beranda')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product.index')}}" class="nav-link {{Route::currentRouteName() === 'product.index' ? "active" : ""}}">{{__('Pesan Tiket')}}</a>
                        </li>
                        @auth
                            @if(Auth::user()->role === 'member')
                                <li class="nav-item">
                                    <a href="{{route('ticket.index')}}" class="nav-link {{Route::currentRouteName() === 'ticket.index' ? "active" : ""}}">{{__('Tiket Saya')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('cart.index')}}" class="nav-link {{Route::currentRouteName() === 'cart.index' ? "active" : ""}}">{{__('Cek Order')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('transaction.index')}}" class="nav-link {{Route::currentRouteName() === 'transaction.index' ? "active" : ""}}">{{__('Histori')}}</a>
                                </li>
                            @elseif (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a href="{{route('product.form')}}" class="nav-link {{Route::currentRouteName() === 'product.form' ? "active" : ""}}">{{__('Tambah Produk')}}</a>
                            </li>
                            @endif
                        @endauth
                        <!-- Authentication Links -->
                        <div class="ms-md-3">
                            @guest
                                @if (Route::currentRouteName() != 'login')
                                    <li class="nav-item">
                                        <a class="btn btn-secondary fw-semibold text-light" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                                    </li>
                                @endif

                                @if (Route::currentRouteName() == 'login')
                                    <li class="nav-item">
                                        <a class="btn btn-secondary fw-semibold text-light" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ explode(" ", Auth::user()->name)[0] }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile') }}">Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4" @yield('background')>
            @if(session('fail'))
                <div class="container py-2">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('fail')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if(session('success'))
                <div class="container py-2">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>

        <div class="container-fluid bg-dark text-light">
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 px-3 py-5 justify-content-center">
                <div class="col col-lg-3 mb-3">
                    <a href="/" class="d-flex align-items-center mb-3">
                        <img src="{{asset('images/web-logo-light.png')}}" alt="Footer Logo" class="img-fluid">
                    </a>
                    <div class="d-flex align-items-center mb-3 gap-3">
                        <i class="bi bi-whatsapp fs-2 text-primary"></i>
                        <div class="col">
                            <h5>WhatsApp</h5>
                            <a href="https://whatsapp.com" class="mb-0">0812-9992-XXXX</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3 gap-3">
                        <i class="bi bi-envelope fs-2 text-primary"></i>
                        <div class="col">
                            <h5>Email</h5>
                            <a href="mailto:cs@easytrip.com" class="mb-0">cs@easytrip.com</a>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-2 mb-3">
                    <h5>Perusahaan</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Blog</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Karir</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Partner</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Membership</a></li>
                    </ul>
                </div>

                <div class="col col-lg-2 mb-3">
                    <h5>Produk</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tiket Pesawat</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sewa Mobil</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Hotel</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tempat Wisata</a></li>
                    </ul>
                </div>

                <div class="col col-lg-2 mb-3">
                    <h5>Dukungan</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pusat Bantuan</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Kebijakan Privasi</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Syarat dan Ketentuan</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Daftarkan Hotel Anda</a></li>
                    </ul>
                </div>

                <div class="col col-lg-2 mb-3">
                    <h5>Download Aplikasi</h5>
                    <a href="https://play.google.com/" class="text-decoration-none">
                        <div class="d-flex align-items-center mb-3 gap-3">
                            <i class="bi bi-google-play fs-2"></i>
                            <p class="text-light mb-0">Dapatkan di<br><b class="fs-5">Google Play</b></p>
                        </div>
                    </a>
                </div>
          </footer>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    @yield('scripts')
</body>
</html>
