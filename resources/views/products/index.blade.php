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
                        <li class="breadcrumb-item active">Products</li>
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
                                <button type="button" id="newProductBtn" class="btn btn-sm btn-outline-success">
                                    New Product
                                </button>
                                <button type="button" id="importProductsBtn" class="btn btn-sm btn-outline-success">
                                    Import
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 30px">SN</th>
                                        <th>Name</th>
                                        <th>Weight</th>
                                        <th>Length</th>
                                        <th>Width</th>
                                        <th>Height</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->weight }}{{ \ProductWeightUnits::getName($product->weigh_unit) }}</td>
                                            <td>{{ $product->length }}{{ \ProductSizeUnits::getName($product->size_unit) }}</td>
                                            <td>{{ $product->width }}{{ \ProductSizeUnits::getName($product->size_unit) }}</td>
                                            <td>{{ $product->height }}{{ \ProductSizeUnits::getName($product->size_unit) }}</td>
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


@push('scripts')
    @include('products.partials.scripts')
@endpush
