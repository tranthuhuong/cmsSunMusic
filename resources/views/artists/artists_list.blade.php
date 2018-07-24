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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Artists</a></li>
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
                        <h4 class="card-title">Danh sách Nghệ sĩ</h4>
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
                                        <th>#</th>
                                        <th>Hình bìa</th>
                                        <th>id</th>
                                        <th>Tên</th>
                                        <th>Tóm tắt</th>
                                        <th>Quốc gia</th>
                                        <th>Bài hát</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                       <th>#</th>
                                       <th>Hình bìa</th>
                                        <th>id</th>
                                        <th>Tên</th>
                                        <th>Tóm tắt</th>
                                        <th>Quốc gia</th>
                                        <th>Bài hát</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($artists as $artist)
                                    <tr>
                                        <td class="text-center"><img src="{{$artist->artist_image}}" class="img-user-list" /></td>
                                        <td class="text-center"><img src="{{$artist->cover_img}}" class="img-cover-list" /></td>
                                        <td>{{$artist->artist_id}}</td>
                                        <td><a href="artists/{{$artist->artist_id}}">{{$artist->artist_name}}</a></td>
                                        <td ><div class="artist_info">{{$artist->info_summary}}</div></td>
                                         <td>{{$artist->nation->nation_name}}</td>
                                        <td>{{$artist->songsinger->count()}}</td>
                                        <td>{{$artist->created_at}}</td>
                                        <td>
                                            <a href="artists/{{$artist->artist_id}}" onclick="event.preventDefault();
                                                     document.getElementById('{{$artist->artist_id}}').submit(); " class="btn btn-danger"> <span class="fa fa-close"></span> 
                                            </a>
                                            <form id="{{$artist->artist_id}}" action="artists/{{$artist->artist_id}}" method="POST" style="display: none;">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                            </form>
                                            <a href="artists/{{$artist->artist_id}}/edit" class="btn btn-primary"><span class="fa fa-edit"></span></a>
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
        <div class="modal" tabindex="-1" role="dialog" id="d1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#d1">
  Launch demo modal
</button>
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

@endsection