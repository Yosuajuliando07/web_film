<div>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">

        <title> {{ $title }} - {{ config('app.name') }}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Site favicon -->
        <link rel="apple-touch-icon" sizes="180x180"
            href="{{ asset('assets/backend/vendors/images/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32"
            href="{{ asset('assets/backend/vendors/images/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16"
            href="{{ asset('assets/backend/vendors/images/favicon-16x16.png') }}">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/styles/core.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/styles/icon-font.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/styles/style.css') }}">
        @stack('css')
        @livewireStyles
    </head>

    <body>

        {{-- Header --}}
        <div class="header">
            <div class="header-left">
                <div class="menu-icon dw dw-menu"></div>
            </div>
            <div class="header-right">
                <div class="user-info-dropdown">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" role="button" data-toggle="dropdown">
                            <span class="user-name">{{ Auth::user()->name }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        {{-- Sidebar --}}
        <div class="left-side-bar">
            <div class="brand-logo">
                <a href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('assets/backend/vendors/images/deskapp-logo.svg') }}}" alt=""
                        class="dark-logo">
                </a>
                <div class="close-sidebar" data-toggle="left-sidebar-close">
                    <i class="ion-close-round"></i>
                </div>
            </div>
            <div class="menu-block customscroll">
                <div class="sidebar-menu">
                    <ul id="accordion-menu">
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                                class="dropdown-toggle no-arrow {{ Request::is('dashboard*') ? 'active' : '' }}">
                                <span class="micon dw dw-right-arrow-7"></span><span class="mtext">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.film.index') }}"
                                class="dropdown-toggle no-arrow {{ Request::is('admin-film*') ? 'active' : '' }}">
                                <span class="micon dw dw-right-arrow-7"></span><span class="mtext">Data Film</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" class="dropdown-toggle no-arrow"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="micon dw dw-right-arrow-7"></span><span class="mtext">Keluar</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        {{-- Content --}}
        <div class="mobile-menu-overlay"></div>

        <div class="main-container">
            {{ $slot }}
        </div>

        <!-- js -->
        <script src="{{ asset('assets/backend/vendors/scripts/core.js') }}"></script>
        <script src="{{ asset('assets/backend/vendors/scripts/script.min.js') }}"></script>
        <script src="{{ asset('assets/backend/vendors/scripts/process.js') }}"></script>
        <script src="{{ asset('assets/backend/vendors/scripts/layout-settings.js') }}"></script>
        @stack('js')
        @livewireScripts
    </body>

    </html>

</div>
