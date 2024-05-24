@extends('layouts.app')
@section('title', 'Settings | ' . config('app.name'))
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard', $shop->id) }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $shop->name }}
                            Settings</li>
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
                                    @if ($shop->logo == 'noimage.png') {{ asset('storage/shops/' . $shop->logo) }}
                                    @else
                                    {{ asset('storage/' . $shop->logo) }} @endif
                                    "
                                    alt="{{ $shop->name }}">
                            </div>

                            <h3 class="profile-username text-center">
                                {{ $shop->name }}
                            </h3>

                            <p class="text-muted text-center">
                                {{ $shop->email }}
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Shop Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>

                            <p class="text-muted">
                                {{ $shop->phone }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-pin mr-1"></i> Address</strong>

                            <p class="text-muted">
                                {{ $shop->address }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-address-card mr-1"></i> County</strong>

                            <p class="text-muted">
                                {{ $shop->county }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marked mr-1"></i> Location</strong>

                            <p class="text-muted">
                                {{ $shop->location }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Country</strong>

                            <p class="text-muted">
                                {{ $shop->country }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-cogs mr-1"></i> Default</strong>

                            <p class="text-muted">
                                @if ($shop->default)
                                    <span class="badge badge-success">
                                        Default
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        others
                                    </span>
                                @endif
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
                                        Settings
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <form id="updateShopForm">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="updateShopName">
                                                        @lang('labels.shops.fields.name')
                                                    </label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="updateShopName" placeholder="@lang('labels.shops.fields.name')"
                                                        value="{{ $shop->name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="updateShopLogo">
                                                        @lang('labels.shops.fields.logo')
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="logo" class="custom-file-input"
                                                                id="updateShopLogo">
                                                            <label class="custom-file-label" for="updateShopLogo">
                                                                Choose file
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.row -->
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="updateShopAddress">
                                                        @lang('labels.shops.fields.address')
                                                    </label>
                                                    <input type="text" name="address" class="form-control"
                                                        id="updateShopAddress" placeholder="@lang('labels.shops.fields.address')"
                                                        value="{{ $shop->address }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="updateShopCounty">
                                                        @lang('labels.shops.fields.county')
                                                    </label>
                                                    <select id="updateShopCounty" name="county" class="form-control select2"
                                                        style="width: 100%;">
                                                        <option selected="selected" disabled="disabled">
                                                            Select @lang('labels.shops.fields.county')
                                                        </option>
                                                        @foreach ($counties as $county)
                                                            <option @if ($shop->county == $county->name)
                                                                selected = "selected"
                                                            @endif>{{ $county->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="addShopLocation">
                                                        @lang('labels.shops.fields.location')
                                                    </label>
                                                    <input type="text" value="{{ $shop->location }}" name="location" class="form-control" id="addShopLocation"
                                                        placeholder="@lang('labels.shops.fields.location')" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="addShopEmail">
                                                        @lang('labels.shops.fields.email')
                                                    </label>
                                                    <input type="email" value="{{ $shop->email }}" name="email" class="form-control" id="addShopEmail"
                                                        placeholder="@lang('labels.shops.fields.email')">
                                                </div>
                                            </div>
                    
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="addShopPhone">
                                                        @lang('labels.shops.fields.phone')
                                                    </label>
                                                    <input type="text" value="{{ $shop->phone }}" name="phone" class="form-control" id="addShopPhone"
                                                        placeholder="@lang('labels.shops.fields.phone')">
                                                </div>
                                            </div>
                                        </div>
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
    <script>
        $(document).ready(function () {
            $('#updateShopForm').submit(function(e) {
            e.preventDefault();
            let form = $(this);
            let formData = new FormData(form[0]);
            let path = '{{ route('settings.index', $shop->id) }}';
            $.ajax({
                type: "POST",
                url: path,
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: function() {
                    form.find('button[type=submit]').html(
                        '<i class="fa fa-spinner fa-spin"></i>');
                    form.find('button[type=submit]').attr('disabled', true);
                },
                complete: function() {
                    form.find('button[type=submit]').html(
                        '{{ trans('buttons.general.update') }}');
                    form.find('button[type=submit]').attr('disabled', false);
                },
                success: function(data) {
                    if (data['status']) {
                        toastr.success(data['message']);
                        $('#updateShopForm')[0].reset();
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    var errorsHtml = '<ul>';
                    $.each(errors['errors'], function(key, value) {
                        errorsHtml += '<li>' + value + '</li>';
                    });
                    errorsHtml += '</ul>';
                    toastr.error(errorsHtml);
                }
            });

        });
        });
    </script>
@endpush
