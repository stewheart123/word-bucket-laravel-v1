@extends('layouts.app')
@section('games-index')
<h1>games</h1>
@foreach ($all_public_games as $game)
<p>{{$game->GM_TITLE}}</p>
@endforeach
@endsection