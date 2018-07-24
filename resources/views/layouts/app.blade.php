<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <base href="{{asset('')}}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/logoSunMusic_white.png">
    <title> @yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
   
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    @yield('css')
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
   <!--  <div class="preloader">
       <svg class="circular" viewBox="25 25 50 50">
           <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
   </div> -->
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="home">
                        <!-- Logo icon -->
                        <b><img src="img/logoSunMusic_white.png" alt="homepage" class="dark-logo" style="width: 30px;" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>SunMusic</span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                         <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else

                        <!-- Search -->
                        {{-- <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li> --}}
                       
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{ Auth::user()->image }}" class="profile-pic" alt="">
                                    {{ Auth::user()->name }}
                                </a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf</form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
         
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="  " href="home" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                          
                        </li>
                        <li class="nav-label">Quản lý</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user-o"></i><span class="hide-menu">Thành viên</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="users">Danh sách</a></li>
                                <li><a href="users/create">Thêm mới</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-star"></i><span class="hide-menu">Nghệ sĩ</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="artists">Danh sách</a></li>
                                <li><a href="artists/create">Thêm mới</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-headphones  "></i><span class="hide-menu">Bài hát</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="songs">Danh sách</a></li>
                                <li><a href="songs/create">Thêm mới</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-play"></i><span class="hide-menu">Playlists</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="playlists">Danh sách</a></li>
                                <li><a href="playlists/create">Thêm mới</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-star"></i><span class="hide-menu">Thể loại</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="kinds">Danh sách</a></li>
                                <li><a href="kinds/create">Thêm mới</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-futbol-o "></i><span class="hide-menu">Quốc gia</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="nations/">Danh sách</a></li>
                                <li><a href="nations/create">Thêm mới</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-commenting-o "></i><span class="hide-menu">Bình luận</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="comments/list">Danh sách</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Thống kê</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-line-chart"></i><span class="hide-menu">Thống kê 1<span class="label label-rouded label-warning pull-right">6</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="ui-alert.html">Alert</a></li>
                                <li><a href="ui-button.html">Button</a></li>
                                <li><a href="ui-dropdown.html">Dropdown</a></li>
                                <li><a href="ui-progressbar.html">Progressbar</a></li>
                                
                            </ul>
                        </li>
                         <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-pie-chart"></i><span class="hide-menu">Thống kê 2<span class="label label-rouded label-warning pull-right">6</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="ui-alert.html">Alert</a></li>
                                <li><a href="ui-button.html">Button</a></li>
                                <li><a href="ui-dropdown.html">Dropdown</a></li>
                                <li><a href="ui-progressbar.html">Progressbar</a></li>
                                
                            </ul>
                        </li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            
            <!-- Container fluid  -->
            @yield('content')
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> Đơn vị chủ quản: Khoa CNTT - HV CNBCVT <br>
            Địa chỉ: Man Thiện, P. Hiệp Phú, Q.9 TP Hồ Chí Minh
            <br>
            Người chịu trách nhiệm nội dung: Trần Thị Thu Hương - Email: n14dcpt158@student.ptithcm.edu.vn - Tel: 0986 698 639
            </footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->

    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    
    @yield('plugin')
</body>

</html>