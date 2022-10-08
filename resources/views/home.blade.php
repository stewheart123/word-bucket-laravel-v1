@extends('layouts.app')


@section('content')
<?php// echo View::make('layouts.hero-home') ?>

<section class="hero-home">
    <div class="container">
        <div class="hero-home__row d-flex">
            <div class="hero-home__text">
                <h1>Welcome to WordBucket</h1>
                <h2 class="h4">A new method for efficiently memorising anything</h2>
                <ul>
                    <li class="h5">Train your brain to memorize new words and phrases</li>
                    <li class="h5">Create word lists that are meaningful to you, then share them with other users</li>
                    <li class="h5">Track your progress through our Lexicon course - from beginner to advanced.</li>
                    <li class="h5">Feel confidence that you can recall words without multiple choice answers - because life doesn't come with subtitles...</li>
                </ul>
            </div>
            <div class="hero-home__image-container">
                <div class="hero-home__circle-image" style="background-image:url('images/person-smiling-circle.jpg');"></div>
            </div>
        </div>
        <div class="row">
            <div class="hero-home__underline">
                <div class="hero-home__icon" style="background-image:url('images/bucket.png');"></div>
            </div>
        </div>
    </div>
</section>

<section class="how-it-works">
    <div class="container">
        <h3>How it works</h3>
        <div class="how-it-works__row row">
            <div class="how-it-works__three-container d-flex">
                <div class="icon-text-container">
                    <div class="how-it-works__icon-container" style="background-image:url('images/pointer-icon.png');"></div>
                    <h4 class="text-center">choose words to learn</h4>
                </div>
                <div class="how-it-works__image-text-flex">
                    <div class="how-it-works__image" style="background-image:url('images/create-square.jpg');"></div>
                        <div class="how-it-works__text-container">
                            <p>Either select a set of words you want to memorise from a range of languages...</p>
                            <p>...or, create your own list of words and share them with others.</p>
                        </div>
                    </div>
                </div>
            
            <div class="how-it-works__three-container d-flex">
                <div class="icon-text-container">    
                    <div class="how-it-works__icon-container" style="background-image:url('images/thought-icon.png');"></div>
                    <h4 class="text-center">memorise in a game</h4>
                </div>
                <div class="how-it-works__image-text-flex">
                <div class="how-it-works__image" style="background-image:url('images/typing-square.jpg');"></div>
                    <div class="how-it-works__text-container">
                        <p>Correctly type out the words in foreign and native languages. The game tracks how well you are memorising.</p>
                        <p>To complete the game, you have to type each word perfectly in both native and foreign.</p>
                    </div>
                </div>
            </div>
            
            <div class="how-it-works__three-container d-flex">
                <div class="icon-text-container">
                    <div class="how-it-works__icon-container" style="background-image:url('images/reading-icon.png');"></div>
                    <h4 class="text-center">track your progress</h4>
                </div>
                <div class="how-it-works__image-text-flex">
                    <div class="how-it-works__image" style="background-image:url('images/comic-reading-square.jpg');"></div>
                        <div class="how-it-works__text-container">
                            <p>Gaining a practical level of a language requires around 2,000 words.</p>
                            <p>We’ve split them into bitsize chunks, organised into importance - so you can grow your vocabulary in a logical progression.</p>
                        </div>
                    </div>
                </div>

        </div>

        <div class="row">
            <a href="{{ url('lexicon-index') }}">
                <div class="button button--orange text-center">I want to memorise a language</div>
            </a>
        </div>
    </div>
</section>

@endsection