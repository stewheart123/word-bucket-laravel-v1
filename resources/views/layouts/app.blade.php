<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="{{ url('/css/styles.css') }}"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="header d-flex align-items-center">
            <div class="container d-flex justify-content-between">
                <div class="d-flex align-items-start flex-column flex-md-row w-50">
                    <a class="header__site-title me-5" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    @if (Auth::check())              
                        <a class="header__menu ms-5" href="/games-index">Learn</a>
                        <a class="header__menu ms-5" href="/adversaries">Adversaries</a>
                        <a class="header__menu ms-5" href="/create">Create</a>
                        @endif
                        @guest
                            <a href="/games-index-demo" class="header__menu">Demo</a>
                        @endguest
                </div>
                @guest
                <div class="d-flex">
                            @if (Route::has('login'))
                            <div class="ms-5">
                                <a href="{{ route('login') }}" class="header__menu">{{ __('Login') }}</a>
                            </div>
                                
                            @endif

                            @if (Route::has('register'))
                            <div class="ms-5">
                                <a href="{{ route('register') }}" class="header__menu">{{ __('Register') }}</a>
                            </div>
                            @endif
                        </div>
                    @else 
                    <div class="ms-5">
                    <a class="header__menu" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>
                    </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                @endguest
                    

            </div>
        </nav>                    
                
                
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="d-none collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    @guest
                        <a class="navbar-brand text-white" href="/games-index-demo">Demo</a>
                    @endguest
                        <!-- <a class="navbar-brand" href="/language-select">Language</a> -->
                        @if (Auth::check())              
                        <a class="navbar-brand text-white" href="/games-index">Learn</a>
                        <a class="navbar-brand text-white" href="/adversaries">Adversaries</a>
                        <a class="navbar-brand text-white" href="/create">Create</a>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                    </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                
        </nav>
</div>

        <main>
            @yield('content')
            @yield('game')
            @yield('public-adversaries')
            @yield('games-index')
            @yield('games-index-demo')
            @yield('create-game')
            @yield('lexicon-index')
        </main>
    </div>
    <footer>
        <div class="container">
            <div class="footer-container d-flex justify-content-between flex-column flex-md-row">
                <div class="mb-3"><a href="/" class="mb-3">Contact</a></div>
                <div class="d-flex">
                    <a href="" target="_blank" class="developer mb-3">created by Stewart Tuckwood @ 2022</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
