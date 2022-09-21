@extends('layouts.app')

@section('game')
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

<section class="game">
    <div class="container bg-dark bg-gradient text-white my-5 py-5">
        <div class="col-12">


    <div id="data-holder">{{$returned_game_data}}</div>
    
<div class="bucket-labels">
    <label class="bucket-lab">tricky</label>
    <label class="bucket-lab">getting there!</label>
    <label class="bucket-lab">winning</label>
</div>
<div class="buckets">
    <div class="bucket red" id="red-bucket">test</div>
    <div class="bucket yellow" id="yellow-bucket">test</div>
    <div class="bucket green" id="green-bucket">test</div>
</div>
@guest
    <a href="/games-index-demo" id="back-button" class="special-button">back</a>
@endguest

@if (Auth::check())              
    <a href="/games-index" id="back-button" class="special-button">back</a>                    
@endif
<div class="input-assembly">
    <div id="country-holder"></div>
    <div class="input-container">
        <label id="current-word">---</label>
        <input type="text" name="input-word" value="..." id="input-field"/>
        <div class="button-container">
            <!--<div id="new-word" class="special-button">new word</div>-->
        </div>
    </div>
    <div id="check-word-button" class="special-button">&#9166;</div>

</div>
<div class="helper-area" id="helper-area">Welcome to WordBucket! <br>Type the word in the language matching the flag.
<br> Get the words correct in both native and foreign language to progress the game.
<br>
Complete the game when you can flawlessly type each word correctly from the green bucket.</div>


</section>
<script type="text/javascript" src="{{asset('js/game.js')}}"></script>

</div>
    </div>
    @guest
        <a class="btn btn-primary btn-sm" href="/games-index-demo">back</a>
    @endguest
    
    @if (Auth::check())              
        <a class="btn btn-primary btn-sm" href="/games-index">back</a>                   
    @endif
@endsection