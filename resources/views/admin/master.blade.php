<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') Elearning</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin-lte/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin-lte/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/morris.js/morris.css')}}">
    <link rel="stylesheet" href="{{asset('assets/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}}">
    @yield('style')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- @section('main') -->
    <header class="main-header">
    <a href="/home" class="logo">
        <span class="logo-mini"><b>E</b>L</span>
        <span class="logo-lg"><b>Elearning</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Mail-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have  messages</li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Thong bao-->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have  notifications</li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>

                <!-- Admin -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('/img/user_default.png')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">admin</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('/img/user_default.png')}}" class="img-circle" alt="User Image">
                            <p>admin</p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div>
                                <a href="{{route('logout')}}" class="btn btn-default btn-flat">Đăng xuất</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    </header>

    <!-- Menu chinh -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user_default.png')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>admin</p>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU CHÍNH</li>
                <li>
                    <a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> <span>Bảng Điều Khiển</span></a>
                </li>

                <!--Quan ly truong -->
                <li>
                    <a href="{{route('adminschool.index')}}">
                        <i class="fa fa-graduation-cap"></i>
                        <span>Quản lý trường học</span>
                    </a>  
                </li>

                <!--Quan ly giang vien -->
                <li>
                    <a href="{{route('adminteacher.index')}}">
                        <i class="fa fa-graduation-cap"></i>
                        <span>Quản lý gíao viên</span>
                    </a>  
                </li>

                <!-- Quan li lop hoc -->
                <li>
                    <a href="{{route('adminlophoc.index')}}">
                        <i class="fa fa-book"></i>
                        <span>Quản lý lớp học</span>
                    </a>
                </li>

                <!-- Quan ly hoc vien -->
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-user"></i> 
                        <span>Quản lý học viên</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li><a href="{{route('adminuser.index')}}"><i class="fa fa-circle-o"></i>Danh sách học sinh đang hoạt động</a></li>
                        <li><a href="{{route('banedstudent')}}"><i class="fa fa-circle-o"></i>Danh sách học sinh bị cấm</a></li>
                    </ul>
                </li>

                <!-- Quan ly dat cho -->
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-shopping-cart"></i> 
                        <span>Quản lý đăng ký học</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('adminbooking.index')}}"><i class="fa fa-circle-o"></i> Đã xác nhận </a></li>
                        <li><a href="{{route('pendingbook')}}"><i class="fa fa-circle-o"></i> Đang chờ duyệt</a></li>
                    </ul>
                </li>

                <!-- Quan ly luot vote -->
                <li>
                    <a href="{{route('adminrate.index')}}">
                        <i class="fa fa-star-o"></i> 
                        <span>Quản lý vote</span>
                    </a>
                </li>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- @show -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
<script src="{{asset('assets/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{asset('assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/morris.js/morris.min.js')}}"></script>
<script src="{{asset('assets/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<script src="{{asset('assets/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('assets/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('assets/admin-lte/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('assets/admin-lte/dist/js/demo.js')}}"></script>
</body>
</html>
