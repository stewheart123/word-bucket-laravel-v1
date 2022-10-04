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
                    @foreach ($personal_games as $personal_game)
                    <a href="/game/{{$personal_game->GM_ID}}" class="swiper-slide user-created-content__word-list-tile --user">
                            <p class="chalk-4">{{$personal_game->GM_TITLE}}</p>
                            <em class="chalk-5">{{$personal_game->GM_DESCRIPTION}}</em>
                            @if($personal_game->GM_PUBLIC == 1) 
                                <em class="chalk-5">public</em>
                            @else 
                                <em class="chalk-5">private</em>
                            @endif
                            <span class="chalk-5 user-created-content --lang-pair">ITA / UK</span>
                    </a>
                    @endforeach

                    <!-- <a href="/lexicon/2" class="swiper-slide user-created-content__word-list-tile --public">
                            <p class="chalk-4">test second</p>
                            <em class="chalk-5">the second lexicon</em>
                            <span class="chalk-5 user-created-content --lang-pair">ITA / UK</span>
                    </a> -->

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
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        grid: {
          rows: 2,
        },
        spaceBetween: 20,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
@endsection