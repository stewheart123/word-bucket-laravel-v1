@extends('layouts.app')
@section('games-index')
<h1>games</h1>
@foreach ($all_public_games as $game)
<div class="game-container card">
    <p>{{$game->GM_TITLE}}</p>
    <p>{{$game->GM_DESCRIPTION}}</p>

</div>
@endforeach
@endsection