@extends('layouts.app')

@section('content')
<section class="login hero-home">
<div class="container">
    <div class="row hero-home__row">        
            <div class="login__card col-6">
                <h1>{{ __('Register') }}</h1>

                <div class="">
                <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="login__email">
                            <label for="name" class="">{{ __('Name') }}</label>
                                <input id="name" type="text" class="chalk-3 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="login__email">
                            <label for="email" class="">{{ __('Email Address') }}</label>
                                <input id="email" type="text" class="chalk-3 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="login__password">
                            <label for="password" class="">{{ __('Password') }}</label>
                                <input id="password" type="password" class="chalk-3 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="login__password">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="chalk-3 form-control" name="password_confirmation" required autocomplete="new-password">          
                        </div>
                        <div class="login__submit d-flex justify-content-end">
                            <button type="submit" class="">
                                {{ __('Register') }}
                            </button>
                        </div>         
                    </form>
                </div>
            </div>
            <div class="hero-home__image-container">
                <div class="hero-home__circle-image" style="background-image:url('images/lady-learning.jpg');"></div>
            </div>
    </div>

    <div class="row">
            <div class="hero-home__underline">
                <div class="hero-home__icon" style="background-image:url('images/bucket.png');"></div>
            </div>
        </div>
</div>
</section>
<!-- old register--> 
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5 bg-dark bg-gradient text-white">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        
                       


                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
