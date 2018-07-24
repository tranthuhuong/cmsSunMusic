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
                <li class="breadcrumb-item"><a href="javascript:void(0)">artist</a></li>
                <li class="breadcrumb-item active">Add</li>
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
                        <h4 class="card-title">Thêm mới Nghệ sĩ</h4>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                            {!! Form::open(['url' => 'artists']) !!}

                            {!! Form::close() !!}
                            <form class="form-valide" method="POST" action="artists" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Tên Nghệ sĩ <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="name" id="val-artistname" placeholder="Nhập tên..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nation_id">Quốc gia <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="nation_id">
                                           
                                           @foreach($nations as $nation)
                                                 <option value="{{$nation->nation_id}}">{{$nation->nation_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-img">Hình ảnh <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" id="i_file" value="" name="artist_image">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-cover">Hình bìa <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" id="i_file" value="" name="cover_img">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-sumary">Tiểu sử <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <textarea name="info_summary" class="form-control"></textarea>
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