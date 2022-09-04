@extends('layouts.app')
@section('games-index-demo')
<section class="game-demo">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>games</h1>

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