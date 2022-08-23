@extends('layouts.app')
@section('public-adversaries')
<section class="adversries-section">
    <div class="container">
        <div class="row">
    <div class="col-12">

    
<div class="w-100">
    <div class="memory-area flex-row justify-content-center flex-wrap">
        <h2 class="text-center">users</h2>
        <p>Add an adversary to gain access to their shared memories</p>
        @foreach ($all_public_users as $public_user)
        <div class="card p-2 m-2 w-25
        @foreach($decoded_adversaries as $decoded)
        @if($public_user->id == $decoded) 
        d-none
        @endif
        @endforeach
        
        
        "><h4 class="text-center">{{$public_user->name}}</h4>
        <em>{{$public_user->UD_BIO}}</em>

        <form action="create-adversary" method="POST" enctype="multipart/form-data">
            @csrf
            <input type = "hidden" name = "UD_ID" value = "{{$public_user->id}}" />
            <button type="submit" class="btn btn-dark">Join</button>
        </form>
        </div>
        @endforeach
    </div>
    </div>
</div>
</section>
@endsection