
@extends('layouts.app')
@section('content')
   
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-music   f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>568120</h2>
                                    <p class="m-b-0">Bài hát</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-headphones f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>1178</h2>
                                    <p class="m-b-0">Playlist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>847</h2>
                                    <p class="m-b-0">Thành viên</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-code-fork  f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>25</h2>
                                    <p class="m-b-0">Lượt truy cập</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Lượt truy cập</h4>
                            </div>
                            <div class="flot-container">
                                <div id="chart1"></div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Top nghệ sĩ</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên</th>
                                                <th>Quốc gia</th>
                                                <th>Số lượng tác phẩm</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iBook</span></td>
                                                <td><span>456 pcs</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/2.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iPhone</span></td>
                                                <td><span>456 pcs</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/3.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iMac</span></td>
                                                <td><span>456 pcs</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iBook</span></td>
                                                <td><span>456 pcs</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-title">
                                        <h4>Comment </h4>
                                    </div>
                                    <div class="recent-comment">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">john doe</h4>
                                                <p>Cras sit amet nibh libero, in gravida nulla. </p>
                                                <p class="comment-date">October 21, 2018</p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">john doe</h4>
                                                <p>Cras sit amet nibh libero, in gravida nulla. </p>
                                                <p class="comment-date">October 21, 2018</p>
                                            </div>
                                        </div>

                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">john doe</h4>
                                                <p>Cras sit amet nibh libero, in gravida nulla. </p>
                                                <p class="comment-date">October 21, 2018</p>
                                            </div>
                                        </div>

                                        <div class="media no-border">
                                            <div class="media-left">
                                                <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Mr. Michael</h4>
                                                <p>Cras sit amet nibh libero, in gravida nulla. </p>
                                                <div class="comment-date">October 21, 2018</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /# card -->
                            </div>
                            <div class="col-lg-2">
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Todo</h4>
                                <div class="card-content">
                                    <div class="todo-list">
                                        <div class="tdl-holder">
                                            <div class="tdl-content">
                                                <ul>
                                                    <li>
                                                        <label>
                                                            <input type="checkbox"><i class="bg-primary"></i><span>Build an angular app</span>
                                                            <a href='#' class="ti-close"></a>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label>
                                                            <input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
                                                            <a href='#' class="ti-close"></a>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label>
                                                            <input type="checkbox" checked><i class="bg-warning"></i><span>Follow back those who follow you</span>
                                                            <a href='#' class="ti-close"></a>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label>
                                                            <input type="checkbox" checked><i class="bg-danger"></i><span>Design One page theme</span>
                                                            <a href='#' class="ti-close"></a>
                                                        </label>
                                                    </li>

                                                    <li>
                                                        <label>
                                                            <input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
                                                            <a href='#' class="ti-close"></a>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="text" class="tdl-new form-control" placeholder="Type here">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
     
</div>
@endsection
@section('plugin')
<!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    
        
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>

    <!--  flot-chart js -->
    <script src="js/lib/flot-chart/excanvas.min.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.pie.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.time.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.stack.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.resize.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.crosshair.js"></script>
    <script src="js/lib/flot-chart/curvedLines.js"></script>
    <script src="js/lib/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script>
        /*  Line
----------------*/

$( function () {

    // first chart
    var chart1Options = {
        series: {
            lines: {
                show: true
            },
            points: {
                show: true
            }
        },
        xaxis: {
            mode: "time",
            timeformat: "%m/%d",
            minTickSize: [ 1, "day" ]
        },
        grid: {
            hoverable: true
        },
        legend: {
            show: false
        },
        grid: {
            color: "#fff",
            hoverable: true,
            borderWidth: 0,
            backgroundColor: 'transparent'
        },
        tooltip: {
            show: true,
            content: "y: %y"
        }
    };
    var chart1Data = {
        label: "chart1",
        color: "#007BFF",
        data: [
      [ 1354521600000, 6328 ],
      [ 1355040000000, 6360 ],
      [ 1355223600000, 6368 ],
      [ 1355306400000, 6374 ],
      [ 1355487300000, 6388 ],
      [ 1355571900000, 6393 ]
    ]
    };
    $.plot( $( "#chart1" ), [ chart1Data ], chart1Options );

} );

    </script>
@endsection