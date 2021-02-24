@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   
                    <h1 class="m-0 text-dark">Microfilm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$admin = DB::table('role_user')->where('role_id', 1)->count()}}</h3>

                            <p>Admin Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('admin/users/role/1') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$students = DB::table('role_user')->where('role_id', 2)->count()}}</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('admin/users/role/2') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
               
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$content = DB::table('contents')->count()}}</h3>
                            <p>Total Contents</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>

                        </div>
                        <a href="{{ url('admin/content') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$plan = DB::table('plans')->count()}}</h3>
                            <p>Total Plan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('admin/plan') }}"class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$profile = DB::table('profiles')->count()}}</h3>
                            <p>Total Profile</p>
                        </div>
                        <div class="icon">

                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('admin/profile') }}"class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$rating = DB::table('ratings')->count()}}</h3>
                            <p>Total Ratings</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('admin/rating') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$stream = DB::table('streams')->count()}}</h3>
                            <p>Total Stream</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('admin/stream') }}"class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$subscription= DB::table('subscriptions')->count()}}</h3>
                            <p>Trial Subscriptions</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('admin/subscriptions') }}"class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$view = DB::table('views')->count()}}</h3>
                            <p>Total Views</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('admin/view') }}"class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$wishlist = DB::table('wishlists')->count()}}</h3>
                            <p>Total Wishlists</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('admin/wishlist') }}"class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

               
                <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


@endsection

