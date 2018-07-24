@extends('layouts.app')

@section('content')
<h3>hihihihio</h3>
 {!! Form::open(['url' => 'nations/add']) !!}

{!! Form::close() !!}
    <form method="POST" action="upload" enctype="multipart/form-data">
        @csrf
        image
        <input type="file" id="i_file" value="" name="imagefile">

        {{-- <input type="file" id="i_file" value="" name="musicfile"> --}}
        <input type="submit" id="i_submit" value="Submit">
        <br>
        <img src="" width="200" id="i_img" style="display:none;" />
    </form>
@endsection
@section('plugin')
<script type="text/javascript">
    $('#i_file').change( function(event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#i_img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));

});
</script>
@endsection