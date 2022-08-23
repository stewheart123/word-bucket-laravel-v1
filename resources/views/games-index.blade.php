@extends('layouts.app')
@section('games-index')
<div class="container">
    <div class="row">
        <div class="col-12">
            
<h1>games</h1>

@if (Auth::check())              
<div class="d-flex justify-content-start">
    <div class="memory-area flex-column">
    <div class="d-flex flex-row">
        <h2>Your Memories</h2>
        <div id="unlock" class="locked btn btn-dark btn-sm">unlock</div>
    </div>
        @foreach ($personal_games as $personal_game)
        <a href="/game/{{$personal_game->GM_ID}}">
            <div class="p-2 m-2 game-container card text-left">
                <strong><p>{{$personal_game->GM_TITLE}}</p></strong>
                <p>{{$personal_game->GM_DESCRIPTION}}</p>
                @if($personal_game->GM_PUBLIC == 1) 
                    <em>public</em>
                @else 
                    <em>private</em>
                @endif
                    @foreach ($languages as $lang)
                        @if($personal_game->GM_NATIVE_ID == $lang->LA_ID)
                            <span><p>{{$lang->LA_DISPLAY_NAME}}</p>
                        @endif
                    @endforeach
                    @foreach ($languages as $lang)
                        @if($personal_game->GM_FOREIGN_ID == $lang->LA_ID)
                            <p>/ {{$lang->LA_DISPLAY_NAME}}</p> </span>
                        @endif
                    
                    @endforeach
                    <form action="destroyGame" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type = "hidden" name = "GM_ID" value = "{{$personal_game->GM_ID}}" />
                                <button type="submit" class="delete-lesson-button d-none btn btn-outline-danger btn-sm">Delete</button>
                    </form>
            </div>
        </a>
        @endforeach
    </div>
    <!--  when clicked, shows conainer with data including list of games? bio, profile pic, nationality?-->
    <div class="memory-area flex-column">
        <label>Wordbucket Offical</label>

        @foreach ($wordbucket_official_games as $wordbucket_game)
        <a href="/game/{{$wordbucket_game->GM_ID}}">
            <div class="p-2 m-2 game-container card text-left">
                <strong><p>{{$wordbucket_game->GM_TITLE}}</p></strong>
                <p>{{$wordbucket_game->GM_DESCRIPTION}}</p>
            </div>
        </a>
        @endforeach
    </div>

    <label>Adversaries' memories</label>
    @foreach($user_adversaries as $adversary)
    <p>{{$adversary->name}}</p>
    <div class="memory-area flex-column">
        @foreach($all_public_games as $public_game)
        @if ($public_game->GM_AUTHOR_ID == $adversary->id)
        <a href="/game/{{$public_game->GM_ID}}">
            <div class="p-2 m-2 game-container card text-left">
                <strong><p>{{$public_game->GM_TITLE}}</p></strong>
                <p>{{$public_game->GM_DESCRIPTION}}</p>
            </div>
        </a>    
        @endif
        @endforeach
    </div>
    @endforeach

</div>

</div>
    </div>
</div>
@endif
    <script type="text/javascript" src="{{asset('js/unlock-delete-button.js')}}"></script>
@endsection