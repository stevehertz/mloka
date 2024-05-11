@extends('layouts.auth')

@section('title', 'Login | '.config('app.name'))

@section('content')
    <p class="login-box-msg">Sign in to start your session</p>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="{{ __('Email Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email"
                autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Sign In') }}
                </button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    {{-- <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> --}}
    <!-- /.social-auth-links -->
    @if (Route::has('password.request'))
        <p class="mb-1">
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </p>
    @endif
    <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
    </p>
@endsection