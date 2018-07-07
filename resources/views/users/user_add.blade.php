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
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
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
                        <h4 class="card-title">Thêm mới Thành viên</h4>
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
                            {!! Form::open(['url' => 'users/add']) !!}

                            {!! Form::close() !!}
                            <form class="form-valide" action="users/add" method="post">
                                @csrf
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Id <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="id" id="val-uid"  placeholder="Nhập ID..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Tên <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="name" id="val-username" placeholder="Nhập tên..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" id="val-email" name="email" placeholder="Nhập email..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password">Mật khẩu <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="val-password" name="password" placeholder="Nhập mật khẩu..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Phân quyền <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="jurisdiction">
                                            <option value="0">Ban quản trị</option>
                                            <option value="1">Thành viên</option>
                                           
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