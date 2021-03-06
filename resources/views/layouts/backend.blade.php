<!DOCTYPE HTML>
<html>
    <head>
        
        <title>Microfilm</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Microfilm" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{ asset('adminLte/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('adminLte/plugins/jqvmap/jqvmap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('adminLte/css/adminlte.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('adminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('adminLte/plugins/daterangepicker/daterangepicker.css') }}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('adminLte/plugins/summernote/summernote-bs4.css') }}">

        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <link href="{{ asset('template/css/font-awesome.css') }}" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{ asset('template/js/menu_jquery.js') }}  "></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">


            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ url('admin/home')}}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <!--<a href="#" class="nav-link">Contact</a>-->
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <!--                <form class="form-inline ml-3">
                                    <div class="input-group input-group-sm">
                                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-navbar" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>-->

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!--Messages Dropdown Menu--> 
                    <!--                    <li class="nav-item dropdown">
                                            <a class="nav-link" data-toggle="dropdown" href="#">
                                                <i class="far fa-comments"></i>
                                                <span class="badge badge-danger navbar-badge">3</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                <a href="#" class="dropdown-item">
                                                     Message Start 
                                                    <div class="media">
                                                        <img src="{{ asset('adminLte/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle') }}">
                                                        <div class="media-body">
                                                            <h3 class="dropdown-item-title">
                                                                Brad Diesel
                                                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                                            </h3>
                                                            <p class="text-sm">Call me whenever you can...</p>
                                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                                        </div>
                                                    </div>
                                                     Message End 
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item">
                                                     Message Start 
                                                    <div class="media">
                                                        <img src="{{ asset('adminLte/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3') }}">
                                                        <div class="media-body">
                                                            <h3 class="dropdown-item-title">
                                                                John Pierce
                                                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                                            </h3>
                                                            <p class="text-sm">I got your message bro</p>
                                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                                        </div>
                                                    </div>
                                                     Message End 
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item">
                                                     Message Start 
                                                    <div class="media">
                                                        <img src="{{ asset('adminLte/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3') }}">
                                                        <div class="media-body">
                                                            <h3 class="dropdown-item-title">
                                                                Nora Silvester
                                                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                                            </h3>
                                                            <p class="text-sm">The subject goes here</p>
                                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                                        </div>
                                                    </div>
                                                     Message End 
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                                            </div>
                                        </li>-->
                    <!--Notifications Dropdown Menu--> 
                    <!--                    <li class="nav-item dropdown">
                                            <a class="nav-link" data-toggle="dropdown" href="#">
                                                <i class="far fa-bell"></i>
                                                <span class="badge badge-warning navbar-badge">15</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                <span class="dropdown-item dropdown-header">15 Notifications</span>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item">
                                                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                                                    <span class="float-right text-muted text-sm">3 mins</span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item">
                                                    <i class="fas fa-users mr-2"></i> 8 friend requests
                                                    <span class="float-right text-muted text-sm">12 hours</span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item">
                                                    <i class="fas fa-file mr-2"></i> 3 new reports
                                                    <span class="float-right text-muted text-sm">2 days</span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                                            </div>
                                        </li>-->

                    <div class="top_left">


                        <a class="nav-link" style ="Color:Black" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">



                          
                        </div>
                        <div class="info">

                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->

                            <li class="nav-item">
                                <a href="{{url('admin/home')}}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a >
                            </li>


                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link">
                                    <i class="fas fa-user-plus"></i>
                                    <p>
                                        Admin
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('admin/users/create/1')}}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>Create New Admin</p>
                                        </a>
                                        <a href="{{url('admin/users/role/1')}}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>All Admin Users</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Users
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item has-treeview">
                                        <a href="{{url('admin/users/create/2')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add New User</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/users/role/2')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Users</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link">
                                    <i class="fa fa-flash "></i>
                                    <p>
                                        Content
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/content/create') }}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>Add new Content</p>
                                        </a>
                                        <a href="{{ url('admin/content') }}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>View all Courses</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/plan') }}" class="nav-link">
                                    <i class="nav-icon fas fa-toggle-on"></i>
                                    <p>Plans</p>
                                </a >
                            </li>


                            <li class="nav-item">
                                <a href="{{ url('admin/profile/create') }}" class="nav-link">
                                    <i class="fa fa-bell "></i>
                                    <p>Profile</p>
                                </a >
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/rating') }}" class="nav-link">
                                    <i class="fa fa-flash "></i>
                                    <p>Rating</p>
                                </a >
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link">
                                    <i class="fa fa-desktop "></i>
                                    <p>
                                        Stream
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/stream/create') }}" class="nav-link">
                                            <i class="fa fa-desktop "></i>
                                            <p>Add new Stream</p>
                                        </a>
                                        <a href="{{ url('admin/stream') }}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>View all Stream</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link">
                                    <i class="fa fa-comment"></i>
                                    <p>
                                        Subscriptions
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/subscription/create') }}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>Add new Subscription</p>
                                        </a>
                                        <a href="{{ url('admin/subscription') }}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>View all Subscription</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link">
                                    <i class="fas fa-share-alt" aria-hidden="true"></i>
                                    <p>
                                        Views
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/view/create') }}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>Add new View</p>
                                        </a>
                                        <a href="{{ url('admin/view') }}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>View all Views</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link">
                                    <i class="fas fa-file-text" aria-hidden="true"></i>
                                    <p>
                                        Wishlist
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/wishlist/create') }}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>Add new Wishlist</p>
                                        </a>
                                        <a href="{{ url('admin/wishlist') }}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>View all Wishlist</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>










                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link">
                                    <p>

                                    </p>
                                </a>

                            </li>

                            </li>




                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            @yield('content')
        </div>
        <style type="text/css">
            table tr th:first-child {width: 50px !important;}
        </style>
        <script>
            var toggle = true;

            $(".sidebar-icon").click(function () {
                if (toggle)
                {
                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({"position": "absolute"});
                } else
                {
                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                    setTimeout(function () {
                        $("#menu span").css({"position": "relative"});
                    }, 400);
                }

                toggle = !toggle;
            });
            $("#menu li a").each(function () {
                if ((window.location.href.indexOf($(this).attr('href'))) > -1) {
                    $(this).parent().addClass('active');
                }
            });
        </script>
        <!-- jQuery -->
        <script src="{{ asset('adminLte/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('adminLte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('adminLte/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('adminLte/plugins/sparklines/sparkline.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('adminLte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('adminLte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('adminLte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('adminLte/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('adminLte/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('adminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('adminLte/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('adminLte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('adminLte/js/adminlte.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('adminLte/js/pages/dashboard.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('adminLte/js/demo.js') }}"></script>
        <!-- jQuery -->
        <!-- Bootstrap 4 -->
        <!-- DataTables -->
        <script src="{{ asset('adminLte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('adminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('adminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    </body>
</html>







