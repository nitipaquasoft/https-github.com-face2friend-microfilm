@extends('layouts.backend')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url(url()->previous()) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>

                            </thead>
                            <tbody>
                                <tr><th>ID.</th><td>{{ $user->id }}</td></tr>
                                <tr><th>Name</th><td> {{ $user->name }} </td></tr>
                                <tr><th>Age</th><td> {{ $user->age }} </td></tr>
                                <tr><th>Phone</th><td> {{ $user->phone }} </td></tr>
                                <tr><th>Alternate Phone</th><td> {{ $user->alt_phone }} </td></tr>
                                <tr><th>Email</th><td> {{ $user->email }} </td></tr>
                                <tr><th>Address</th><td> {{ $user->address }} </td></tr>
                                <tr><th>City</th><td> {{ $user->city }} </td></tr>
                                <tr><th>State</th><td> {{ $user->state }} </td></tr>
                                <tr><th>Country</th><td> {{ $user->country }} </td></tr>
                                <tr><th>Pin Code</th><td> {{ $user->pin_code }} </td></tr>
                                <tr><th>Distributer</th><td> {{ $user->distributer }} </td></tr>
                                <tr><th>Dob</th><td> {{ $user->dob }} </td></tr>
                                <tr><th>Created At</th><td> {{ $user->created_At }} </td></tr>
                                <tr>
                                    <th>Status</th>
                                    <?php if (!empty($user->status == '1')) { ?>
                                        <td> Active </td>
                                    <?php } else { ?>
                                        <td> Inactive</td>
                                    <?php } ?>
                                </tr>

                                <tr><th>Created At</th><td> {{ $user->created_at }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
