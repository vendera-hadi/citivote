<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title', 'Page Title')</title>

    <!-- Icon -->
    <link rel="shortcut icon" sizes="114x114" href="{{{ asset('images/myna/logo.png') }}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-fill @yield('background')" id="myna">
    <div id="app">
        <nav class="navbar nav-fill w-100 p-0">
            <div class="container-full w-100">
                <div class="border-nav-top w-100"></div>
                <a href="#">
                    <div class="logo-bg1"></div>
                    <div class="logo-bg2"></div>
                    <img src="{{{ asset('images/myna/logo.png') }}}" class="image-fluid logo" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div class="navbar-nav ml-auto">
                        <!-- <img src="{{ asset('images/50_year.png') }}" alt=""> -->
                    </div>
                </div>
            </div>
            @auth
            <form id="logout" method="post" action="{{route('logout')}}">
              @csrf
              <a onclick="document.getElementById('logout').submit();" class="btn">
                <i class="fa fa-sign-out fa-3x text-dark"></i>
              </a>
            </form>
            @endauth
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        @yield('modal')
    </div>
</body>
</html>
