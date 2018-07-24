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
                <li class="breadcrumb-item"><a href="javascript:void(0)">songs</a></li>
                <li class="breadcrumb-item ">{{$song->song_id}}</li>
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
                            <h2 class="card-title"><strong>Thông tin Bài hát</strong> 
                                <a href="songs/{{$song->song_id}}/edit" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                            </h2> 
                            <img src="{{$song->song_image}}" alt="">
                            <br><br>
                            <h5>{{$song->song_name}}</h5>
                            <br><br>
                            <audio id="myAudio" controls autoplay>
                              <source src="{{$song->link}}" type="audio/mpeg">
                            </audio>
                            <br><br>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-xs-6 b-r"> <strong>Người đăng</strong>
                                <br>
                                <p class="text-muted">{{$song->user->name}}</p>
                            </div>
                            <div class="col-md-2 col-xs-6 b-r"> <strong>Trình bày</strong>
                                <br>
                                <p class="text-muted">
                                    @foreach($song->singers as $singersongs)
                                        <a href="artists/{{$singersongs->artists->artist_id}}/detail">{{$singersongs->artists->artist_name}}</a>
                                             
                                    @endforeach
                                </p>
                            </div>
                             <div class="col-md-2 col-xs-6 b-r"> <strong>Sáng tác</strong>
                                <br>
                                <p class="text-muted">
                                    @foreach($song->authors as $authorsongs)
                                    <a href="artists/{{$authorsongs->artists->artist_id}}/detail">{{$authorsongs->artists->artist_name}}</a></p>
                                    
                                    @endforeach
                                    
                            </div>
                             <div class="col-md-2 col-xs-6 b-r"> <strong>Thể loại</strong>
                                <br>
                                <p class="text-muted">
                                    @foreach($song->kinds as $kindsong)
                                       {{$kindsong->kinds->kind_name}} 
                                   @endforeach
                                </p>
                            </div>
                            <div class="col-md-2 col-xs-6 b-r"> <strong>Số lượt xem</strong>
                                <br>
                                <p class="text-muted">{{$song->amount_view}}</p>
                            </div>
                            <div class="col-md-2 col-xs-6"> <strong>Thời gian tạo</strong>
                                <br>
                                <p class="text-muted">{{$song->created_at}}</p>
                            </div>
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
    <script>
        document.getElementById("myAudio").autoplay;
    </script>

@endsection