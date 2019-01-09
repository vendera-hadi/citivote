<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title', 'Page Title')</title>

    <!-- Icon -->
    <link rel="shortcut icon" sizes="114x114" href="{{{ asset('images/logo.png') }}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-blur">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-citivote">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <small class="text-white">Forward Compatible</small><br>
                    <img src="{{{ asset('images/logo.png') }}}" class="image-fluid" alt="">
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
                <i class="fa fa-sign-out fa-3x text-white"></i>
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
