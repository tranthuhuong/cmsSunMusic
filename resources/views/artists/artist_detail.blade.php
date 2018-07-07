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
                <li class="breadcrumb-item"><a href="javascript:void(0)">artists</a></li>
                <li class="breadcrumb-item ">{{$artist->artist_id}}</li>
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
                        <div class="card-two text-center">
                            <h2 class="card-title"><strong>Thông tin Nghệ sĩ</strong> 
                                <a href="artists/edit/{{$artist->artist_id}}" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                            </h2> 
                            <img src="{{$artist->artist_image}}" alt="">
                            <br><br>
                            <h5>{{$artist->artist_name}}</h5>
                            <br><br>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-6 b-r"> <strong>Quốc gia</strong>
                                <br>
                                <p class="text-muted">{{$artist->nation->nation_name}}</p>
                            </div>
                             <div class="col-md-4 col-xs-6 b-r"> <strong>Số lượng bài hát</strong>
                                <br>
                                <p class="text-muted">{{$artist->songsinger->count()}}</p>
                            </div>
                            <div class="col-md-4 col-xs-6"> <strong>Thời gian tạo</strong>
                                <br>
                                <p class="text-muted">{{$artist->created_at}}</p>
                            </div>
                        </div>
                        <hr>
                        <p>{{$artist->info_summary}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách Bài hát của {{$artist->artist_name}}</h4>
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
                                        <th>Tên Bài</th>
                                        <th>Thể loại</th>
                                        <th>Quốc gia</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>id</th>
                                        <th>Tên Bài</th>
                                        <th>Thể loại</th>
                                        <th>Quốc gia</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($artist->songsinger as $song)
                                    <tr>
                                        <td >
                                            <img src="{{$song->songs->song_image}}" alt="" class="img-user-list">
                                        </td>
                                        <td>{{$song->songs->song_id}}</td>
                                        <td>
                                            <a href="songs/{{$song->songs->song_id}}/detail">{{$song->songs->song_name}}</a>
                                            
                                        </td>
                                        <td>
                                            @foreach($song->songs->kinds as $kind)
                                               {{$kind->kinds->kind_name}} 
                                           @endforeach
                                        </td>
                                        <td>{{$song->songs->nation->nation_name}}</td>
                                       
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