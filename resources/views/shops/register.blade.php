@extends('layouts.auth')

@section('title', 'Register Shop | ' . config('app.name'))

@section('content')
    <p class="login-box-msg">Register Default Shop</p>
    <form action="{{ route('shops.register') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id", value="{{ Auth::user()->id }}">
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="@lang('labels.shops.fields.name')" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-building"></span>
                </div>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                placeholder="@lang('labels.shops.fields.address')" value="{{ old('address') }}" required autocomplete="address" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-map-pin"></span>
                </div>
            </div>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <select name="county" class="form-control select2" required autofocus>
                <option selected="selected" disabled="disabled">Select @lang('labels.shops.fields.county')</option>
                @forelse ($counties as $county)
                    <option>
                        {{ $county->name }}
                    </option>
                @empty
                @endforelse
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-address-card"></span>
                </div>
            </div>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                placeholder="@lang('labels.shops.fields.location')" value="{{ old('location') }}" required autocomplete="region" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-map-marked"></span>
                </div>
            </div>
            @error('location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="@lang('labels.shops.fields.email')" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope-open-text"></span>
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
                placeholder="@lang('labels.shops.fields.phone')" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                </div>
            </div>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row">
            <!-- /.col -->
            <div class="col-12">
                <button type="submit" class="btn btn-block btn-outline-primary">
                    @lang('buttons.general.create')
                </button>
            </div>
            <!-- /.col -->
        </div>
        <br>
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
@endpush
