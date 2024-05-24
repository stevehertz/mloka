@extends('layouts.app')

@section('title', 'Send Percel | ' . config('app.name'))

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
                        <li class="breadcrumb-item active">Send Percel</li>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                {{ count($customers) }}
                            </h3>
                            <p>Customers</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="javascript:void(0)" id="newCustomerBtn" class="small-box-footer">
                            Add New <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ count($products) }}</h3>
                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <a href="javascript:void(0)" id="newProductBtn" class="small-box-footer">
                            Add New <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!--/.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                Send Percel
                            </h3>
                        </div>
                        <form id="sendPercelForm">
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Product</label>
                                            <select name="product_id" class="form-control select2" style="width: 100%;">
                                                <option selected="selected" disabled="disabled">
                                                    Select Product You are sending
                                                </option>
                                                @forelse ($products as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->name }}
                                                    </option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Customer</label>
                                            <select name="customer_id" class="form-control select2" style="width: 100%;">
                                                <option selected="selected" disabled="disabled">
                                                    Select Customer You are sending To
                                                </option>
                                                @forelse ($customers as $customer)
                                                    <option value="{{ $customer->id }}">
                                                        {{ $customer->user->first_name }} {{ $customer->user->last_name }}
                                                    </option>
                                                @empty
                                                @endforelse

                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="sendPercelLocation">Location</label>
                                            <input type="text" name="location" class="form-control"
                                                id="sendPercelLocation" placeholder="Location">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-block btn-outline-success">
                                    Send
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @include('percel.modals.addCustomer')
        @include('percel.modals.addProducts')
    </section>

@endsection

@push('scripts')
    @include('percel.partials.scripts')
@endpush
