@extends('layouts.app')
@section('lexicon-index')
<section class="hero-home lexicon">
    <div class="container">
        <div class="row">
            <h1 class="text-center">Memorise a word set</h1>
        </div>
        <div class="row">
            <h2 class="h4">Select a word set to learn</h2>
            <h2 class="h4">create a free account to save your progress</h2>
        </div>
        <div class="row">
            <div class="hero-home__underline">
                <div class="hero-home__icon" style="background-image:url('images/bucket.png');"></div>
            </div>
        </div>
    </div>    
</section>
<section class="lexicon__level-display">
    <div class="container">
        <div class="row">
            <div class="lexicon__level-button-container d-flex">
                <div id="elementary" class="lexicon__level-button selected">Elementary
                    <div class="lexicon__milestone-a">
                        <label>Your progress</label>
                    </div>
                </div>
                <div id="pre-intermediate" class="lexicon__level-button">Pre-intermediate
                <div class="lexicon__milestone-a">
                        <label>500 words</label>
                    </div>
                </div>
                <div id="intermediate" class="lexicon__level-button">Intermediate
                <div class="lexicon__milestone-a">
                        <label>1000 words</label>
                    </div>
                </div>
                <div id="advanced" class="lexicon__level-button">Advanced
                <div class="lexicon__milestone-a">
                        <label>2000 words</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="lexicon__level-progress-bar-inner"></div> 
            <div class="lexicon__level-progress-bar">
                <!-- <div class="lexicon__level-progress-line"></div> -->
                <div class="lexicon__start-milestone">
                    <label>your progress</label>
                </div>
            </div>
        </div>
        <div class="lexicon__milestone-container row">
            

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="lexicon--relative col-12">
                    <div class="lexicon__word-list-container">
                        @for ($i = 0; $i < 25; $i++)
                        <div class="lexicon__word-list-tile">
                            <p>title</p>
                            <span>#tag #tag #tag</span>
                        </div>
                        @endfor
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="lexicon__category-container col-12 d-flex">
                <label>Category :</label> 
                @for ($i = 0; $i < 25; $i++)
                        <div class="lexicon__category-pill">
                            category
                        </div>
                        @endfor
            </div>
        </div>
    </div>


</section>
@endsection