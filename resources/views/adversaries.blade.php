@extends('layouts.app')
@section('public-adversaries')

<div class="d-flex justify-content-start">
    <div class="memory-area flex-column">
        <label>users</label>
        
        @foreach ($all_public_users as $public_user)
        <div class="card p-2 m-2    
        @foreach($decoded_adversaries as $decoded)
        @if($public_user->id == $decoded) 
        d-none
        @endif
        @endforeach
        
        
        ">{{$public_user->name}}

        <form action="create-adversary" method="POST" enctype="multipart/form-data">
            @csrf
            <input type = "hidden" name = "UD_ID" value = "{{$public_user->id}}" />
            <button type="submit" class="btn btn-outline-standard btn-sm">Join</button>
        </form>
        </div>
        @endforeach
    </div>
    <!--  when clicked, shows conainer with data including list of games? bio, profile pic, nationality?-->
    <div class="memory-area flex-column">
        <label>Wordbucket Offical</label>
    </div>
    <div class="memory-area flex-column">
        <label>Adversaries' memories</label>
    </div>

</div>
@endsection