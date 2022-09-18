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
                    <li class="h5">Retain and apply your knowledge by reading some comics from our free publication store - sized for Amazon Kindle devices in mind.</li>
                    <li class="h5">Feel confidence that you can recall words without multiple choice answers - because life doesn't come with subtitles...</li>
                </ul>
            </div>
            <div class="hero-home__image-container">
                <div class="hero-home__circle-image" style="background-image:url('images/person-studying.jpg');"></div>
            </div>
        </div>
        <div class="row">
            <div class="hero-home__underline">
                <div class="hero-home__icon" style="background-image:url('images/bucket.png');"></div>
            </div>
        </div>
    </div>
</section>

@endsection
