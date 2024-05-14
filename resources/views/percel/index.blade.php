@extends('layouts.app')

@section('title', 'Products | ' . config('app.name'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $shop->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard', $shop->id) }}">Home</a></li>
                        <li class="breadcrumb-item active">Sent Percels</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <a href="{{ route('percels.send.percel', $shop->id) }}">
                                    <button type="button" class="btn btn-sm btn-outline-success">
                                        Send Percel
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 30px">SN</th>
                                        <th>Product</th>
                                        <th>Customer</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $percel)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $percel->product->name }}</td>
                                            <td>
                                                {{ $percel->customer->user->first_name }}
                                                {{ $percel->customer->user->last_name }}
                                            </td>
                                            <td>{{ $percel->location }}</td>
                                            <td>{{ \PercelStatus::getName($percel->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        @include('products.modals.newProduct')
        @include('products.modals.import')
    </section>



@endsection
