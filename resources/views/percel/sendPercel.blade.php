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
                <div class="col-12">
                    <div class="card card-success">
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
    </section>

@endsection

@push('scripts')
    @include('percel.partials.scripts')
@endpush
