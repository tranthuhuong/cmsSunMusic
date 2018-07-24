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
                <li class="breadcrumb-item">Edit</li>
                <li class="breadcrumb-item active">{{$nation->nation_id}}</li>
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
                        <h4 class="card-title">Chỉnh sửa </h4> <small>{{$nation->nation_name}}</small>
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
                            <form class="form-valide" action="nations/{{$nation->nation_id}}" method="post">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Tên quốc gia <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="nation_name" id="nation_name"  placeholder="Nhập Tên quốc gia" value="{{$nation->nation_name}}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <input type="submit" value="Lưu chỉnh sửa" class="btn btn-primary">
                                        <a class="btn btn-dark" href="nations/list">Hủy</a>
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