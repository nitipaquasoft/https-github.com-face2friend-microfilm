@extends('layouts.backend')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Form</li>
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
                    <div class="card">
                        <?php if ($role_id == '1') { ?>
                            <div class="card-header">Edit Admin</div>
                            <?php
                        }
                        if ($role_id == '2') {
                            ?>
                            <div class="card-header">Edit User</div>
                            <?php
                        }
                        if ($role_id == '3') {
                            ?>
                            <div class="card-header">Edit Video Uploader</div>
                        <?php }
                        ?>
                        <div class="card-body">
                            <a href="{{url()->previous()}}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
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
                             {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/admin/users/role/1', $user->id],
                            'class' => 'form-horizontal'
                            ]) !!}
                                @include ('admin.users.adminform', ['formMode' => 'edit'])
                            <?php } ?>
                            <?php if ($role_id == '2') { ?>
                                 {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/admin/users/role/2', $user->id],
                            'class' => 'form-horizontal'
                            ]) !!}
                                @include ('admin.users.userform', ['formMode' => 'edit'])
                            <?php } ?>
                            <?php if ($role_id == '3') { ?>
                                   {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/admin/users/role/3', $user->id],
                            'class' => 'form-horizontal'
                            ]) !!}
                                @include ('admin.users.videoform', ['formMode' => 'edit'])
                            <?php } ?>


                            {!! Form::close() !!}

                        </div>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


@endsection
