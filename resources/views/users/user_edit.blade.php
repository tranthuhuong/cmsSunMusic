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
                        <h4 class="card-title">Chỉnh sửa Thành viên</h4>
                         <div class="form-validation">
                            <form class="form-valide">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Id <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-uid" name="val-username" placeholder="Nhập ID.." value="Huong" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Tên <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Nhập tên.." value="Huong">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" id="val-email" name="val-email" placeholder="Nhập email.." value="Huong@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password">Mật khẩu <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Nhập mật khẩu.." value="Huong">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Phân quyền <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="val-skill">
                                            <option value="0">Ban quản trị</option>
                                            <option value="1">Thành viên</option>
                                           
                                        </select>
                                    </div>
                                </div>
                               
                                
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button  class="btn btn-primary">Lưu</button>
                                         <button  class="btn btn-dark">Hủy</button>
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