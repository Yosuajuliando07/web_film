<div>
    <!DOCTYPE html>
    <html lang="zxx">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Anime Template">
        <meta name="keywords" content="Anime, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }} - {{ config('app.name') }}</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/elegant-icons.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/plyr.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/slicknav.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" type="text/css">

        <style>
            .form-control:focus {
                box-shadow: none;
            }

            .form-control::placeholder {
                font-size: 0.95rem;
                color: #aaa;
                font-style: italic;
            }
        </style>
        <!-- Scripts -->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
        @vite(['resources/sass/style.scss', 'resources/js/app.js'])
        @stack('css')
        @livewireStyles
    </head>

    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Header Section Begin -->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="header__logo">
                            <a href="./index.html">
                                {{-- <img src="{{ asset('assets/frontend/img/logo.png') }}" alt=""> --}}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="header__nav">
                            <nav class="header__menu mobile-menu">
                                <ul>
                                    @if (Auth::check() && Auth::user()->role->level == 'administrator')
                                        <li class=""><a href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                                        </li>
                                    @endif

                                    <li class="{{ Request::is('homepage*') ? 'active' : '' }}"><a
                                            href="{{ route('homepage') }}">Homepage</a></li>

                                    <li class="{{ Request::is('scrp*') ? 'active' : '' }}"><a
                                            href="{{ route('scrp') }}">Live Streaming</a></li>
                                    <li><a href="./categories.html">Genre <span class="arrow_carrot-down"></span></a>
                                        <ul class="dropdown">
                                            <li><a href="./anime-details.html">Anime Details</a></li>
                                            <li><a href="./anime-watching.html">Anime Watching</a></li>
                                            <li><a href="./blog-details.html">Blog Details</a></li>
                                            <li><a href="./signup.html">Sign Up</a></li>
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="header__right">
                            @guest
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}">Login</a>
                                @endif

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </div>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </header>
        <!-- Header End -->

        {{ $slot }}

        <!-- Footer Section Begin -->
        <footer class="footer">
            <div class="page-up">
                <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
            </div>

        </footer>
        <!-- Footer Section End -->

        <!-- Search model Begin -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch"><i class="icon_close"></i></div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div>
        <!-- Search model end -->

        <!-- Js Plugins -->
        <script src="{{ asset('assets/frontend/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/player.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/mixitup.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/jquery.slicknav.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
        @stack('css')
        @livewireScripts
    </body>

    </html>
</div>
