@extends('layouts.app')

@section('game')
<section class="hero-home">
    <div class="container">
        <div class="hero-home__row d-flex">
            <div class="hero-home__text">
                <h1>Get ready to train your&nbsp;brain</h1>
                <h2 class="h4">Aim for perfection</h2>
                <ul>
                    <li class="h5">The game will show you a word, you have to type it in the foreign language you have selected.</li>
                    <li class="h5">After all words are complete, you are shown the foreign word - type back in your native language.</li>
                    <li class="h5">Getting words correct in either language will progress the game.</li>
                    <li class="h5">To complete it, you must type each word perfectly in one go.</li>
                    <li class="h5">Pro tip - develop a strategy for remembering the words by relatng parts of the word into things you already know.</li>
                </ul>
            </div>
            <div class="hero-home__image-container">
                <div class="hero-home__circle-image" style="background-image:url( {{ url('/images/play-circle.jpg') }}"></div>
            </div>
        </div>
        <div class="row">
            <div class="hero-home__underline">
                <div class="hero-home__icon" style="background-image:url(' {{ url('/images/translate.png') }}"></div>
            </div>
        </div>
    </div>
</section>
<section class="game-area">
    <div class="game-area__exit-container">
    @guest
        <a class="game-area__exit-button" href="/games-index-demo">EXIT</a>
    @endguest
    
    @if (Auth::check())              
        <a class="game-area__exit-button" href="/games-index">EXIT</a>                   
    @endif

    </div>
    <div class="container">
        <div class="row">
            <div class="mt-5 m-auto col-11">
                <div class="game-area__blackboard">
                    <div class="game-area__word-input-area">
                        <p id="current-word" class="h1 game-area__target-word">Test</p>
                        <div class="input-assembly d-flex">
                            <div id="country-holder"></div>
                            <input class="chalk-2 game-area__word-input" type="text"  name="input-word" value="..." id="input-field"/>
                            <div id="check-word-button" class="special-button">&#9166;</div>
                        </div>
                        
                        <!-- <p class="result-analysis h1">result</p>
                        <p class="result-indicator h1">Correct!</p> -->
                    </div>

                    <div class="game-area__helper-area">
                        <h4 id="result-underline" class="chalk-3">helper text area</h4>
                        <p id="helper-area" class="chalk-4">This is the helper text area wher yo get extra stuff</p>
                        <p id="your-answer" class="chalk-5">Compare your response to the correct answer here..</p>

                    </div>
                </div>
                <div class="game-area__blackboard-shelf"></div>
            </div>
        </div>
        <div class="row">
            <div class="game-area__squared-paper">
                <div class="game-area__progress-bars-container">
                    <!-- <div class="progress-bar">
                        <div class="progress-bar__foreign"></div>
                        <div class="progress-bar__native"></div>
                        <div class="progress-bar__baseline"></div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GAME DATA -->
<div id="data-holder" class="d-none">{{$returned_game_data}}</div>

<script type="text/javascript" src="{{asset('js/game.js')}}"></script>
@endsection