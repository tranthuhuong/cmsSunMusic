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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Artist</a></li>
                <li class="breadcrumb-item active">Edit</li>
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
                        <h4 class="card-title">Chỉnh sửa Nghệ sĩ</h4>
                         <div class="form-validation">
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
                            {!! Form::open(['url' => 'artists/edit']) !!}

                            {!! Form::close() !!}
                            <form class="form-valide" action="artists/edit/{{$artist->artist_id}}"" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Tên Nghệ sĩ <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="Artist_name" id="val-artistname" placeholder="Nhập tên.." value="{{$artist->artist_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nation_id">Quốc gia <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="nation_id">
                                           
                                           @foreach($nations as $nation)
                                                <option
                                                    @if($nation->nation_id==$artist->nation_id)
                                                        {{"selected"}}
                                                    @endif
                                                 value="{{$nation->nation_id}}">{{$nation->nation_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-img">Hình ảnh <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-img" name="artist_image" placeholder="Nhập hình ảnh.." value="{{$artist->artist_image}}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-cover">Hình bìa <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-cover" name="  cover_img" placeholder="Nhập hình ảnh.." value="{{$artist->cover_img}}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-sumary">Tiểu sử <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <textarea id="info_summary" name="info_summary" rows="4" class="form-control" >{{$artist->info_summary}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <input type="submit"> 
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
@endsection