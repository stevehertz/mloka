@extends('layouts.app')

@section('title', 'Profile | ' . config('app.name'))

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard', $shop->id) }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="
                                    @if (Auth::user()->profile == 'noimage.png') {{ asset('storage/users/' . Auth::user()->profile) }}
                                    @else
                                    {{ asset('storage/' . Auth::user()->profile) }} @endif
                                    "
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </h3>

                            <p class="text-muted text-center">
                                &nbsp;
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>

                            <p class="text-muted">
                                {{ Auth::user()->phone }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-envelope mr-1"></i> Email Address</strong>

                            <p class="text-muted">
                                {{ Auth::user()->email }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-user-cog mr-1"></i> Gender</strong>

                            <p class="text-muted">
                                {{ \Gender::getName(Auth::user()->gender) }}
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#activity" data-toggle="tab">
                                        Edit Profile
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <form id="updateProfileForm">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="updateProfileFirstName">
                                                        @lang('labels.users.fields.first_name')
                                                    </label>
                                                    <input type="text" name="first_name" class="form-control"
                                                        id="updateProfileFirstName" placeholder="@lang('labels.users.fields.first_name')"
                                                        value="{{ Auth::user()->first_name }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="updateProfileLastName">
                                                        @lang('labels.users.fields.last_name')
                                                    </label>
                                                    <input type="text" name="last_name" class="form-control"
                                                        id="updateProfileLastName" placeholder="@lang('labels.users.fields.last_name')"
                                                        value="{{ Auth::user()->last_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="updateProfilePic">
                                                        @lang('labels.users.fields.profile')
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="profile" class="custom-file-input"
                                                                id="updateProfilePic">
                                                            <label class="custom-file-label" for="exampleInputFile">
                                                                Choose file
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.row -->
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="updateProfilePhone">
                                                        @lang('labels.users.fields.phone')
                                                    </label>
                                                    <input type="text" name="phone" class="form-control"
                                                        id="updateProfilePhone" placeholder="@lang('labels.users.fields.phone')"
                                                        value="{{ Auth::user()->phone }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="updateProfileEmail">
                                                        @lang('labels.users.fields.email')
                                                    </label>
                                                    <input type="email" name="email" class="form-control"
                                                        id="updateProfileEmail" placeholder="@lang('labels.users.fields.email')"
                                                        value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="updateProfileGender">
                                                        @lang('labels.users.fields.gender')
                                                    </label>
                                                    <select name="gender" id="updateProfileGender"
                                                        class="form-control select2" style="width: 100%;" required>
                                                        <option selected="selected" disabled="disabled">
                                                            Select @lang('labels.users.fields.gender')
                                                        </option>
                                                        @foreach (\Gender::toArray() as $key => $value)
                                                            <option value="{{ $key }}"
                                                                @if (isset(Auth::user()->gender) && $key == Auth::user()->gender) selected="selected" @endif>
                                                                {{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                        </div>
                                        <!--/.row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-block btn-outline-success">
                                                    @lang('buttons.general.update')
                                                </button>
                                            </div>
                                        </div>
                                        <!--/.row -->
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')
    @include('profile.partials.scripts')
@endpush
