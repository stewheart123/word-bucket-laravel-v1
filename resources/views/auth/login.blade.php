@extends('layouts.app')

@section('content')
<section class="login hero-home">
<div class="container">
    <div class="row">        
            <div class="login__card col-6">
                <h1>{{ __('Login') }}</h1>

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login__email">
                            <label for="email" class="">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="chalk-3 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                        </div>
                        <div class="login__password">
                            <label for="password" class="">{{ __('Password') }}</label>
                            <input id="password" type="password" class="chalk-3 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror           
                        </div>
                        <div class="login__submit d-flex justify-content-end">
                            <button type="submit" class="">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="login__lower">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>      
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="login__recover" href="{{ route('password.request') }}">
                                    {{ __('recover my password') }}
                                </a>
                            @endif
                        </div>         
                    </form>
                </div>
            </div>
            <div class="hero-home__image-container">
                <div class="hero-home__circle-image" style="background-image:url('images/login-circle.jpg');"></div>
            </div>
    </div>

    <div class="row">
            <div class="hero-home__underline">
                <div class="hero-home__icon" style="background-image:url('images/bucket.png');"></div>
            </div>
        </div>
</div>
</section>
@endsection
