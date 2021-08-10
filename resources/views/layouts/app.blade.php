<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link  rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    SocMarket
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('virtual_markets.index') }}">Virtual Markets
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
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid d-flex">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        @if(Route::is('virtual_markets.*'))
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('virtual_markets.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                Virtual markets <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        @endif
                        @if(Route::is('virtual_markets.show' ))
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                Linked stores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                Products
                            </a>
                        </li>
                        @endif
                    </ul>


                </div>
            </nav>
            <main class="col-md-9 col-lg-10 app-main">

                <div class="container-fluid d-flex">
                    @if(Route::is('virtual_markets.index'))
                        <a class="d-flex align-items-center btn btn-panel" href="{{route('virtual_markets.create')}}">
                            Add Virtual Market
                        </a>
                    @endif
                    @if(Route::is('virtual_markets.show'))
{{--                            <a class="d-flex align-items-center btn btn-panel" href="{{route('virtual_markets.create')}}">--}}
{{--                                Add Virtual Market--}}
{{--                            </a>--}}
                    <a class="d-flex align-items-center btn btn-panel" href="{{route('stores.create')}}">
                        Attach store
                    </a>
                    <a class="d-flex align-items-center btn btn-panel" href="{{route('categories.create')}}">
                        Add category
                    </a>
                        <a class="d-flex align-items-center btn btn-panel" href="{{route('products.create')}}">
                            Add product
                        </a>

                    @elseif(Route::is('stores.index'))

                        <a class="d-flex align-items-center btn btn-panel" href="{{route('stores.create')}}">
                            Attach store
                        </a>
                        <a class="d-flex align-items-center btn btn-panel" href="{{route('categories.create')}}">
                            Add category
                        </a>
                        <a class="d-flex align-items-center btn btn-panel" href="{{route('products.create')}}">
                            Add product
                        </a>
{{--                    @elseif(Route::is('stores.add'))--}}

{{--                        <a class="d-flex align-items-center btn btn-panel" href="{{route('stores.create')}}">--}}
{{--                            Attach store--}}
{{--                        </a>--}}
{{--                        <a class="d-flex align-items-center btn btn-panel" href="{{route('categories.create')}}">--}}
{{--                            Add category--}}
{{--                        </a>--}}
{{--                        <a class="d-flex align-items-center btn btn-panel" href="{{route('products.create')}}">--}}
{{--                            Add product--}}
{{--                        </a>--}}
                    @endif
                </div>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
