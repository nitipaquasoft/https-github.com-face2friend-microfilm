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
                                <tr><th>ID</th><td>{{ $rating->id }}</td></tr>
                                <tr><th>User Id </th><td>{{ $rating->user_id }} </td></tr>
                                <tr><th>Content Id </th><td>{{ $rating->content_id }} </td></tr>
                                <tr><th>Rating </th><td>{{ $rating->rating }} </td></tr>
                                <tr><th>comment </th><td>{{ $rating->comment }} </td></tr>
                                <tr><th>Created At </th><td>{{ $rating->created_at }} </td></tr>
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

