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
                <li class="breadcrumb-item"><a href="javascript:void(0)">playlists</a></li>
                <li class="breadcrumb-item">{{$playlist->playlist_id}}</li>
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
                            <h2 class="card-title"><strong>Thông tin Playlist</strong> 
                                <a href="playlists/{{$playlist->playlist_id}}/edit" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                            </h2> 
                            <img src="{{$playlist->playlist_image}}" alt="">
                            <br><br>
                            <h5>{{$playlist->name_playlist}}</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Người tạo</strong>
                                <br>
                                <p class="text-muted">{{$playlist->user->name}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Số Bài hát</strong>
                                <br>
                                <p class="text-muted">{{$playlist->songs->count()}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Số lượt xem</strong>
                                <br>
                                <p class="text-muted">{{$playlist->amount_view}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Thời gian tạo</strong>
                                <br>
                                <p class="text-muted">{{$playlist->created_at}}</p>
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
                        <h4 class="card-title">Danh sách Bài hát trong playlist</h4>
                        <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                        <a href="playlists/{{$playlist->playlist_id}}#addsong" class="btn btn-success" >Thêm Bài hát vào Playist</a>
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
                                        <th>Trình bày</th>
                                        <th>Sáng tác</th>
                                        <th>Thể loại</th>
                                        <th>Quốc gia</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>id</th>
                                        <th>Tên Bài</th>
                                        <th>Trình bày</th>
                                        <th>Sáng tác</th>
                                        <th>Thể loại</th>
                                        <th>Quốc gia</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach($playlist->songs as $song)
                                    {{-- {{$song->kinds->kinds->kind_name}} --}}
                                    <tr>
                                        <td >
                                            <img src="{{$song->song_image}}" alt="" class="img-user-list">
                                        </td>
                                        <td>{{$song->song_id}}</td>
                                        <td><a href="songs/{{$song->song_id}}/detail">{{$song->song_name}}</a></td>
                                        <td>
                                            @foreach($song->singers as $singers)
                                               {{$singers->artists->artist_name}} 
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($song->authors as $authors)
                                               {{$authors->artists->artist_name}} 
                                            @endforeach
                                        </td>
                                        <td>@foreach($song->kinds as $kind)
                                               {{$kind->kinds->kind_name}} 
                                            @endforeach
                                        </td>
                                        <td>{{$song->nation->nation_name}} </td>
                                       
                                        <td class="text-center">
                                            <a href="playlists/{{$playlist->playlist_id}}/delSong/{{$song->song_id}}" class="btn btn-danger"> <span class="fa fa-close"></span> </a>
                                            
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
        <div class="row" id="addsong">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm Bài hát vào playlist</h4>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        
                            {!! Form::open(['url' => 'songlists/add']) !!}

                            {!! Form::close() !!}
                            <form class="form-valide" action="playlists/{{$playlist->playlist_id}}/addSong" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="song_id">Bài hát <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="song_id">
                                           
                                           @foreach($songs as $song)
                                                 <option value="{{$song->song_id}}">{{$song->song_name}} -</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <input type="submit" class="btn btn-primary"> 
                                    </div>
                                </div>
                            </form>

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