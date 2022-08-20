@extends('layouts.app')
@section('public-adversaries')

@foreach ($all_public_users as $public_user)
<p>{{$public_user->name}}</p>
@endforeach
@endsection