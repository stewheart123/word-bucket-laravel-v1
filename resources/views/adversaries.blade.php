@extends('layouts.app')
@section('public-adversaries')
<section class="adversries-section">
    <div class="container">
        <div class="row">
            <div class="col-12">

    <div class="memory-area flex-row justify-content-center text-white">
        <h2 class="text-center">Adversaries</h2>
        <p>Add an adversary to gain access to their shared memories.</p>
        <p><em>An Adversary is just a clever way of saying 'internet friend'</em></p>
        </div>
</div>
</div>
        <div class="row">
        @foreach ($all_public_users as $public_user)

        <div class=" col-3 card p-2 m-1 bg-dark bg-gradient text-white
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
<form action="store-completed-word-set" method="POST" enctype="multipart/form-data">
    @csrf         
 
    <input type = "hidden" name = "WS_ID" value = "1" />
    <button type="submit" class="btn btn-dark">Mark Completed</button>
</form>

</section>
@endsection