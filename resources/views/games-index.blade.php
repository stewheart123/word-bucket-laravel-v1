@extends('layouts.app')
@section('games-index')
<section class="hero-home">
    <div class="container">
        <div class="hero-home__row d-flex">
            <div class="hero-home__text">
                <h1>Get ready to train your&nbsp;brain</h1>
                <h2 class="h4">Select a topic to memorise</h2>
                <ul>
                    <li class="h5">The game will show you a word, you have to type it in the foreign language you have selected.</li>
                    <li class="h5">After all words are complete, you are shown the foreign word - type back in your native language.</li>
                    <li class="h5">Getting words correct in either language will progress the game.</li>
                    <li class="h5">To complete it, you must type each word perfectly in one go.</li>
                    <li class="h5">Pro tip - develop a strategy for remembering the words by relatng parts of the word into things you already know.</li>
                </ul>
            </div>
            <div class="hero-home__image-container">
                <div class="hero-home__circle-image" style="background-image:url('images/learn-circle.jpg');"></div>
            </div>
        </div>
        <div class="row">
            <div class="hero-home__underline">
                <div class="hero-home__icon" style="background-image:url('images/topic.png');"></div>
            </div>
        </div>
    </div>
</section>

<section class="user-created-content">
    <div class="container">
        <div class="row">
            <div class="col-12">            
                <h3>user created content</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="lexicon--relative col-12">
                <div class="swiper mySwiper user-created-content__word-list-container">
                    <div class="swiper-wrapper">

                    <!-- PERSONAL GAME TILES-->
                    @foreach ($personal_games as $personal_game)
                    <a href="/game/{{$personal_game->GM_ID}}" class="swiper-slide user-created-content__word-list-tile --user">
                        <p class="chalk-4">{{$personal_game->GM_TITLE}}</p>
                        <em class="chalk-5">{{$personal_game->GM_DESCRIPTION}}</em>
                        @if($personal_game->GM_PUBLIC == 1) 
                            <em class="chalk-5">public</em>
                        @else 
                            <em class="chalk-5">private</em>
                        @endif
                        @foreach ($languages as $lang)
                            @if($personal_game->GM_NATIVE_ID == $lang->LA_ID)
                            <span class="user-created-content --lang-pair"><p class="chalk-5">{{$lang->LA_DISPLAY_NAME}}</p>
                            @endif
                        @endforeach
                        @foreach ($languages as $lang)
                            @if($personal_game->GM_FOREIGN_ID == $lang->LA_ID)
                            <p class="chalk-5">/ {{$lang->LA_DISPLAY_NAME}}</p> </span>
                            @endif
                        @endforeach
                    </a>
                    @endforeach
                    
                    <!-- PUBLIC GAME TILES-->
                    @foreach ($all_public_games as $public_game)
                    <a href="/game/{{$public_game->GM_ID}}" class="swiper-slide user-created-content__word-list-tile --public">
                            <p class="chalk-4">{{$public_game->GM_TITLE}}</p>
                            <em class="chalk-5">{{$public_game->GM_DESCRIPTION}}</em>
                            @foreach ($languages as $lang)
                            @if($public_game->GM_NATIVE_ID == $lang->LA_ID)
                            <span class="user-created-content --lang-pair"><p class="chalk-5">{{$lang->LA_DISPLAY_NAME}}</p>
                            @endif
                        @endforeach
                        @foreach ($languages as $lang)
                            @if($public_game->GM_FOREIGN_ID == $lang->LA_ID)
                            <p class="chalk-5">/ {{$lang->LA_DISPLAY_NAME}}</p> </span>
                            @endif
                        @endforeach
                    </a>
                    @endforeach

                    </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>

    </div>
</section>
    <script type="text/javascript" src="{{asset('js/unlock-delete-button.js')}}"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script type="text/javascript" src="{{asset('js/swiper-setup.js')}}"></script>
@endsection