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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="{{ url('/css/styles.css') }}"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="header d-flex align-items-center">
            <div class="container d-flex justify-content-between">
                <div class="d-flex align-items-center flex-column flex-md-row">
                    <!-- <a class="header__site-title me-5" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a> -->
                    <a href="{{ url('/') }}" class="ml6 header__site-title me-1">
                        <span class="text-wrapper">
                            <span class="letters">{{ config('app.name', 'Laravel') }}</span>
                        </span>
                    </a>

                    @if (Auth::check())              
                        <!-- <a class="header__menu ms-5" href="/games-index">Learn</a> -->
                        <!-- <a class="hover-menu header__menu ms-5" href="/adversaries">Adversaries</a> -->
                        <div class="ms-5 sub-menu">Learn
                            <div class="sub-menu-inner">
                                <a class="header__menu" href="/games-index">User content</a>
                                <a class="header__menu" href="{{ url('lexicon-index') }}">Lexicon</a>
                            </div>
                        </div>
                        <a class="header__menu ms-5" href="/create">Create</a>
                        @endif
                        @guest
                            <a href="{{ url('lexicon-index') }}" class=" ms-5 header__menu">Demo</a>
                        @endguest
                </div>
                @guest
                <div class="d-flex align-items-center">
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
                    @endguest
                    @if (Auth::check())              
                    <div class="ms-5 d-flex flex-column justify-content-center">
                    <a class="header__menu" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>
                    </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endif
                <div id="burger-menu"></div>
            </div>
        </nav>                   
        <!--  mobile menu -->
<div class="mobile-slide-menu-mask">
            <div id="mobile-side-menu">
        @if (Auth::check())                  
            <a class="h3" href="/games-index">User content</a>
            <a class="h3" href="{{ url('lexicon-index') }}">Lexicon</a>
            <a class="h3" href="/create">Create</a>
        @endif
        @guest
            <a href="{{ url('lexicon-index') }}" class="h3">Demo</a> 
            
            @if (Route::has('login'))    
            <a href="{{ route('login') }}" class="h3">{{ __('Login') }}</a>   
            @endif
            
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="h3">{{ __('Register') }}</a>
            @endif
            @endguest
            @if (Auth::check())              
            <a class="h3" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
            </a>
                    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @endif
    </div>
</div><!-- mobile menu mask -->
               <!-- m m end -->
        <main>
            @yield('content')
            @yield('game')
            @yield('game-lexicon')
            @yield('public-adversaries')
            @yield('games-index')
            @yield('games-index-demo')
            @yield('create-game')
            @yield('lexicon-index')
        </main>
    </div>
    
</body>


        <footer>
        <div class="footer-container d-flex justify-content-between flex-column flex-md-row">
            <div class="mb-3"><a href="/" class="mb-3">Contact</a></div>
            <div class="d-flex">
                <p class="developer mb-3">created by Stewart Tuckwood @ 2022</p>
            </div>
        </div>
    </footer>

    
    <script type="text/javascript" src="{{asset('js/logo-animation.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/mobile-menu.js')}}"></script>
</html>
