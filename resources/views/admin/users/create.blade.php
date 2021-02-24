@extends('layouts.backend')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registration Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Registration Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">

                <div class="card">
                    <?php if ($role_id == '1') { ?>
                        <div class="card-header">Create New Admin</div>
                    <?php }
                    if ($role_id == '2') {
                        ?>
                        <div class="card-header">Create New User</div>
                    <?php }
                    if ($role_id == '3') {
                        ?>
                        <div class="card-header">Create New Video Uploader</div>
                    <?php }
                    ?>

                    <div class="card-body">
                        <a href="{{ url(url()->previous()) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                      

                        <?php if ($role_id == '1') { ?>
                            @include ('admin.users.adminform', ['formMode' => 'create'])
                        <?php } ?>
                        <?php if ($role_id == '2') { ?>
                              {!! Form::open(['url' => '/admin/users/role/2', 'class' => 'form-horizontal']) !!}
                            @include ('admin.users.userform', ['formMode' => 'create'])
                        <?php } ?>
                        <?php if ($role_id == '3') { ?>
                            @include ('admin.users.videoform', ['formMode' => 'create'])
<?php } ?>


                        {!!Form::close()!!}

                    </div>
                </div>

            </div>
        </div><!--/.container-fluid -->
    </section>
    <!--/.content -->
</div>

@endsection
