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
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <a href="#" class="btn btn-block btn-sm btn-outline-primary">
                                    @lang('buttons.shops.new')
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Shop Name</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th style="width: 40px">Select</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $shop)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard', $shop->id) }}">
                                                        {{ $shop->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $shop->address }}
                                                </td>
                                                <td>
                                                    {{ $shop->city }}
                                                </td>
                                                <td>
                                                    {{ $shop->state }}
                                                </td>
                                                <td>
                                                    {{ $shop->country }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('dashboard', $shop->id) }}"
                                                        class="btn btn-block btn-outline-primary btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No Shops Found. Please Register!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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
