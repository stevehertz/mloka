@extends('layouts.app')

@section('title', 'Customers | ' . config('app.name'))

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
                        <li class="breadcrumb-item active">Customers</li>
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
                                <button type="button" id="newCustomerBtn" class="btn btn-block btn-sm btn-outline-success">
                                    New Customer
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 30px">SN</th>
                                        <th>Full Names</th>
                                        <th>Phone Number</th>
                                        <th>Email Address</th>
                                        <th>Gender</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $customer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $customer->user->first_name }} {{ $customer->user->last_name }}
                                            </td>
                                            <td>
                                                {{ $customer->user->phone }}
                                            </td>
                                            <td>
                                                {{ $customer->user->email }}
                                            </td>
                                            <td>
                                                {{ \Gender::getName($customer->user->gender) }}
                                            </td>
                                            <td>
                                                {{ $customer->location }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                No Customers Added Yet!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        @include('customers.modal.newCustomer')
    </section>

@endsection

@push('scripts')
   @include('customers.partials.scripts')
@endpush
