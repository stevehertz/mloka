@extends('layouts.auth')

@section('title', 'Register | ' . config('app.name'))

@section('content')

    <p class="login-box-msg">Register a new membership</p>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                placeholder="First name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">1
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                placeholder="Last name" value="{{ old('last_name') }}" required autocomplete="last_name">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email">
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
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                placeholder="Phone Number" value="{{ old('phone') }}" required autocomplete="phone">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone-alt"></span>
                </div>
            </div>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="{{ __('Password') }}" required autocomplete="new-password">
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
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                &nbsp;
            </div>
            <!-- /.col -->
            <div class="col-6">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Register') }}
                </button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    {{-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
        </a>
    </div> --}}
    @if (Route::has('login'))
        <a href="{{ route('login') }}" class="text-center">
            I already have a membership
        </a>
    @endif
@endsection
