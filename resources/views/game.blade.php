@extends('layouts.app')

@section('game')
@guest
    <a class="navbar-brand" href="/games-index-demo">back</a>
@endguest

@if (Auth::check())              
    <a class="navbar-brand" href="/games-index">back</a>                   
@endif
<section class="game">
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
<a href="/" id="back-button" class="special-button">back</a>
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
<div class="helper-area" id="helper-area">Welcome to WordBucket! <br>Type the word in the language matching the flag.</div>

</section>
<script type="text/javascript" src="{{asset('js/test.js')}}"></script>
@endsection