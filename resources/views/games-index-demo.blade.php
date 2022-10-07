@extends('layouts.app')
@section('games-index-demo')

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
<section class="game-demo">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>select a category to learn</h1>
                    <div class="d-flex justify-content-start ">

    <!--  when clicked, shows conainer with data including list of games? bio, profile pic, nationality?-->
    <div class="memory-area flex-column text-white">
        <label>Wordbucket Offical</label>

        @foreach ($wordbucket_official_games as $wordbucket_game)
        <a href="/game/{{$wordbucket_game->GM_ID}}">
            <div class="p-2 m-2 game-container card text-left bg-dark bg-gradient text-white">
                <strong><p>{{$wordbucket_game->GM_TITLE}}</p></strong>
                <p>{{$wordbucket_game->GM_DESCRIPTION}}</p>
                @foreach ($languages as $lang)
                    @if($wordbucket_game->GM_NATIVE_ID == $lang->LA_ID)
                        <span><p>{{$lang->LA_DISPLAY_NAME}}</p>
                    @endif
                    @endforeach
                    @foreach ($languages as $lang)
                        @if($wordbucket_game->GM_FOREIGN_ID == $lang->LA_ID)
                            <p>/ {{$lang->LA_DISPLAY_NAME}}</p> </span>
                        @endif
                @endforeach
            </div>
        </a>
        @endforeach
    </div>

</div>
            </div>
        </div>
    </div>
</section>
@endsection