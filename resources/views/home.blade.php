@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">
            <div class="card bg-dark bg-gradient">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }} -->
                    <div class="card-body text-white">
                        <h2 class="text-center">Welcome to Wordbucket!</h2>
                        <p class="h5">Introducing a language learning system that's efficient and built for your needs.</p>
                        <ul class="h5">
                            <li class="py-3">Train your brain to memorize new words and phrases</li>
                            <li class="py-3">Create word lists that are meaningful to you, then share them with other users</li>
                            <li class="py-3">Retain and apply your knowledge by reading some comics from our free publication store - sized for Amazon Kindle devices in mind.</li>
                            <li class="py-3">Feel confidence that you can recall words without multiple choice answers - because life doesn't come with subtitles...</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
