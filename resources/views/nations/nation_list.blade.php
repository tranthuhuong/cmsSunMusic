@extends('layouts.app')
@section('css')
<link href="css/style_page.css" rel="stylesheet">
@endsection
@section('content')
<!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Nations</a></li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </div>
    </div>
            <!-- End Bread crumb -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách Quốc gia</h4>

                        <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                         @if(session('thongbao'))
                           <div class="alert alert-primary alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Thông báo!</strong> {{session('thongbao')}}
                            </div>
                        @endif
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Tên quốc gia</th>
                                        <th>SL Nghệ sĩ</th>
                                        <th>SL Bài hát</th>
                                        <th>Thời gian tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Tên quốc gia</th>
                                        <th>SL Nghệ sĩ</th>
                                        <th>SL Bài hát</th>
                                        <th>Thời gian tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($nations as $nation)
                                    <tr>
                                        <td>{{$nation->nation_id}}</td>
                                        <td>{{$nation->nation_name}}</td>
                                        <td>{{$nation->artists->count()}}</td>
                                        <td>{{$nation->songs->count()}}</td>
                                        <td>{{$nation->created_at}}</td>
                                        <td>
                                            <a href="" class="btn btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('{{$nation->nation_id}}').submit(); " > <span class="fa fa-close"></span> </a>
                                            <form id="{{$nation->nation_id}}" action="nations/{{$nation->nation_id}}" method="POST" style="display: none;">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                            </form>
                                            <a href="nations/{{$nation->nation_id}}/edit" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
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

    <script src="js/lib/toastr/toastr.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>

@endsection