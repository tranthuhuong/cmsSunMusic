
@extends('layouts.app')
@section('title','SunMusic - Chi tiết User')
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
                <li class="breadcrumb-item"><a href="javascript:void(0)">users</a></li>
                <li class="breadcrumb-item">{{$user->id}}</li>
                <li class="breadcrumb-item active">detail</li>
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
                        <div class="card-two text-center">
                            <h2 class="card-title"><strong>Thông tin user</strong> 
                                <a href="users/edit/{{$user->id}}" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                            </h2> 
                            <img src="{{$user->image}}" alt="" class="img_profile">
                            <br><br>
                            <h5>{{$user->name}}</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{$user->email}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Phân Quyền</strong>
                                <br>
                                <p class="text-muted">{{$user->jurisdiction->jurisdiction_name}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Số Playlist</strong>
                                <br>
                                <p class="text-muted">{{$user->playlists->count()}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Thời gian tạo</strong>
                                <br>
                                <p class="text-muted">{{$user->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách Playlist của {{$user->name}}</h4>
                        <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                         @if(session('messList'))
                           <div class="alert alert-warning alert-dismissible fade show" style="margin-top: 30px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Thông báo!</strong> {{session('messList')}}
                            </div>
                        @endif
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>id</th>
                                        <th>Tên Playlist</th>
                                        <th>Người tạo</th>
                                        <th>Số lượng bài</th>
                                        <th>Số người xem</th>
                                        <th>Thời gian tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>id</th>
                                        <th>Tên Playlist</th>
                                        <th>Người tạo</th>
                                        <th>Số lượng bài</th>
                                        <th>Số người xem</th>
                                        <th>Thời gian tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($user->playlists as $playlist)
                                    <tr>
                                         <td >
                                            <img src="{{$playlist->playlist_image}}" alt="" style="width: 100px;">
                                        </td>
                                        <td>{{$playlist->playlist_id}}</td>
                                        <td><a href="playlists/{{$playlist->playlist_id}}/detail">{{$playlist->name_playlist}}</a></td>
                                        <td>{{$playlist->user->id}}</td>
                                        <td>{{$playlist->songs->count()}}</td>
                                        <td>{{$playlist->amount_view}}</td>
                                        <td>{{$playlist->created_at}}</td>
                                        <td>
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