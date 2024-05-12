@extends('layouts.app_shops')

@section('title', 'Register Shop | ' . config('app.name'))

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Shops</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Shops</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <a href="{{ route('shops.register') }}" class="btn btn-block btn-sm btn-outline-primary">
                                    Register Shop
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="registerShopForm"  method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label for="shopName">
                                                @lang('labels.shops.fields.name')
                                            </label>
                                            <input type="text" name="name" class="form-control" id="shopName"
                                                placeholder="@lang('labels.shops.fields.name')">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="shopName">
                                                @lang('labels.shops.fields.address')
                                            </label>
                                            <input type="text" name="address" class="form-control" id="shopAddress"
                                                placeholder="@lang('labels.shops.fields.address')">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="shopPostalCode">
                                                @lang('labels.shops.fields.postal_code')
                                            </label>
                                            <input type="text" name="postal_code" class="form-control" id="shopPostalCode"
                                                placeholder="@lang('labels.shops.fields.postal_code')">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="shopState">
                                                @lang('labels.shops.fields.state')
                                            </label>
                                            <input type="text" name="state" class="form-control" id="shopState"
                                                placeholder="@lang('labels.shops.fields.state')">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="shopCity">
                                                @lang('labels.shops.fields.city')
                                            </label>
                                            <input type="text" name="city" class="form-control" id="shopCity"
                                                placeholder="@lang('labels.shops.fields.city')">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="shopCountry">
                                                @lang('labels.shops.fields.country')
                                            </label>
                                            <select name="country" class="form-control select2" style="width: 100%;">
                                                <option selected="selected" disabled="disabled">Select @lang('labels.shops.fields.country')</option>
                                                @foreach ($countries as $code => $name)
                                                    <option>{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="shopPhone">
                                                @lang('labels.shops.fields.phone')
                                            </label>
                                            <input type="text" name="phone" class="form-control" id="shopPhone"
                                                placeholder="@lang('labels.shops.fields.phone')">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="shopPhone">
                                                @lang('labels.shops.fields.email')
                                            </label>
                                            <input type="email" name="email" class="form-control" id="shopEmail"
                                                placeholder="@lang('labels.shops.fields.email')">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-block btn-outline-primary">
                                            Register
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('shops.index') }}" class="btn btn-block btn-outline-danger">
                                            Back
                                        </a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            $('#registerShopForm').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                let formData = new FormData(form[0]);
                let path = '{{ route('shops.register') }}';
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
                        form.find('button[type=submit]').html('Register');
                        form.find('button[type=submit]').attr('disabled', false);
                    },
                    success: function(data) {
                        if (data['status']) {
                            toastr.success(data['message']);
                            $('#registerShopForm')[0].reset();
                            setTimeout(() => {
                                window.location.href = '{{ route('shops.index') }}';
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
