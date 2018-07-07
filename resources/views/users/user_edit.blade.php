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
                <li class="breadcrumb-item">Edit</li>
                <li class="breadcrumb-item active">{{$user->id}}</li>
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
                        <h4 class="card-title">Chỉnh sửa Thành viên {{$user->id}}</h4>
                         <div class="form-validation">
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
                            {!! Form::open(['url' => 'users/edit']) !!}

                            {!! Form::close() !!}
                            <form class="form-valide" action="users/edit/{{$user->id}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Id <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-uid" value="{{$user->id}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Tên <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control"  name="name" placeholder="Nhập tên.." value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" name="email" placeholder="Nhập email.." value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password">Mật khẩu <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control"   name="password" placeholder="Nhập mật khẩu.." value="{{$user->password}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nation_id">Phân quyền <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="jurisdiction_id">
                                           
                                           @foreach($jurisdictions as $jurisdiction)
                                                 <option 
                                                    @if($jurisdiction->jurisdiction_id==$user->jurisdiction_id)
                                                        {{"selected"}}
                                                    @endif
                                                  value="{{$jurisdiction->jurisdiction_id}}">{{$jurisdiction->jurisdiction_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password">Hình ảnh <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-password" name="image" placeholder="Hình ảnh.." value="{{$user->image}}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <input type="submit" value="Lưu" class="btn btn-primary">
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