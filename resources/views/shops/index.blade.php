@extends('layouts.app')

@section('title', 'Shops | ' . config('app.name'))

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
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <a href="javascript:void(0)" id="addShopBtn" class="btn btn-block btn-sm btn-outline-primary">
                                @lang('buttons.shops.new')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Shop Name</th>
                                        <th>Logo</th>
                                        <th>Address</th>
                                        <th>County</th>
                                        <th>Location</th>
                                        <th>Country</th>
                                        <th>Phone Number</th>
                                        <th>Email Address</th>
                                        <th>Default</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $shop)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ route('dashboard', $shop->id) }}">
                                                    {{ $shop->name }}
                                                </a>
                                            </td>
                                            <td>
                                                <img src="@if ($shop->logo == 'noimage.png') {{ asset('storage/shops/' . $shop->logo) }} @else {{ asset('storage/' . $shop->logo) }} @endif" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            </td>
                                            <td>
                                                {{ $shop->address }}
                                            </td>
                                            <td>
                                                {{ $shop->county }}
                                            </td>
                                            <td>
                                                {{ $shop->location }}
                                            </td>
                                            <td>
                                                {{ $shop->country }}
                                            </td>
                                            <td>
                                                {{ $shop->phone }}
                                            </td>
                                            <td>
                                                {{ $shop->email }}
                                            </td>
                                            <td>
                                                @if ($shop->default)
                                                    <span class="badge badge-success">
                                                        Default
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger">
                                                        others
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard', $shop->id) }}"
                                                    class="btn btn-sm btn-outline-primary btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if (!$shop->default)
                                                    <button data-id="{{ $shop->id }}"
                                                        class="btn btn-sm btn-outline-danger deleteShopBtn">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        @include('shops.modal.addShop')
    </div>
    <!-- /.content -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#addShopBtn', function(e) {
                e.preventDefault();
                $('#addShopForm').trigger("reset");
                $('#addShopModal').modal('show');
            });

            $('#addShopForm').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                let formData = new FormData(form[0]);
                let path = '{{ route('shops.add.shop', $shop->id) }}';
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
                            '{{ trans('buttons.general.create') }}');
                        form.find('button[type=submit]').attr('disabled', false);
                    },
                    success: function(data) {
                        if (data['status']) {
                            toastr.success(data['message']);
                            $('#addShopForm')[0].reset();
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

            $(document).on('click', '.deleteShopBtn', function(e) {
                e.preventDefault();
                let shop_id = $(this).data('id');
                let path = '{{ route('shops.delete', ':shop') }}';
                path = path.replace(":shop", shop_id);
                let token = '{{ csrf_token() }}';
                Swal.fire({
                    title: '@lang('notifications.delete_alert')',
                    text: '@lang('notifications.delete_message')',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: path,
                            data: {
                                _token: token
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data['status']) {
                                    toastr.success(data['message']);
                                    setTimeout(() => {
                                        location.reload();
                                    }, 500);
                                }
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                });
            });


        });
    </script>
@endpush
