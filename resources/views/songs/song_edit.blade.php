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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Quốc gia</a></li>
                <li class="breadcrumb-item active">Thêm mới</li>
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
                        <h4 class="card-title">Chỉnh sửa {{$song->song_name}}</h4>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-primary alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Thông báo!</strong> {{session('thongbao')}}
                            </div>
                        @endif
                            {!! Form::open(['url' => 'songs/edit']) !!}

                            {!! Form::close() !!}
                            <form class="form-valide" action="songs/edit/{{$song->song_id}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name"> Tên bài hát <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="song_name" id="song_name"  placeholder="Nhập Tên Bài hát" value="{{$song->song_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Hình ảnh <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="song_image" id="song_image"  placeholder="Nhập hình" value="{{$song->song_image}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Link bài hát <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="link" id="link"  placeholder="Nhập Nhạc" value="{{$song->link}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nation_id">Quốc gia <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="nation_id">
                                           
                                           @foreach($nations as $nation)
                                                 <option 
                                                    @if($nation->nation_id==$song->nation_id)
                                                        {{"selected"}}
                                                    @endif
                                                  value="{{$nation->nation_id}}">{{$nation->nation_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nation_id">Trình bày <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="singer_id">
                                           
                                           @foreach($artists as $artist)
                                                <option
                                                    @if($artist->artist_id==$song->singer_id)
                                                    {{"selected"}}
                                                    @endif
                                                  value="{{$artist->artist_id}}">{{$artist->artist_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nation_id">Sáng tác <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="author_id">
                                           
                                           @foreach($artists as $artist)
                                                 <option 
                                                    @if($artist->artist_id==$song->author_id)
                                                    {{"selected"}}
                                                    @endif
                                                 value="{{$artist->artist_id}}">{{$artist->artist_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="kind_id">Thể loại <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="kind_id">
                                           
                                           @foreach($kinds as $kind)
                                                 <option 
                                                    @if($song->kind_id==$kind->kind_id)
                                                    {{"selected"}}
                                                    @endif
                                                 value="{{$kind->kind_id}}">{{$kind->kind_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <input type="submit" value="Xác nhận" class="btn btn-primary">
                                        
                                    </div>
                                </div>
                            </form>
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

@endsection