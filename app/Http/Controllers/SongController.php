<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nation;
use App\Kind;
use App\Artist;
use App\Song;
use App\Singersong;
use App\Author_song;
use App\Kind_song;
use App\Songlist;
use App\Comment;
use App\HistoriesListening;
use DB;
use Auth;
use App\Googl;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class SongController extends Controller
{
     //
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$songs=Song::all();
    	return view('songs.song_list',['songs'=>$songs]);
    }
    public function show($id){
        $song=Song::find($id);
        return view('songs.song_detail',['song'=>$song]);
    }
     public function edit($id){
    	$song=Song::where('song_id', $id)->first();
    	$nations=Nation::all();
    	$kinds=Kind::all();
    	$artists=Artist::orderBy('artist_id')->get();
    	return view('songs.song_edit',['song'=>$song, 'nations'=>$nations,'kinds'=>$kinds,'artists'=>$artists]);
    }
    public function update(Request $request,$id){
    	$song=Song::where('song_id', $id)->first();
    	$this->validate($request,
    		[
    			'song_name'=>'required|min:4|max:80'
    		],
    		[
    			'song_name.required'=>'Chưa nhập Tên Quốc gia',
    			'song_name.min'=>'Phải nhập lớn hơn 4 ký tự'
    		]);
    	$song->song_name=$request->song_name;
        $song->song_image=$request->song_image;
        $song->link=$request->link;
        $song->nation_id=$request->nation_id;
        $song->uid=Auth::user()->id;
        $song->save();

        $singers=Singersong::where('song_id',$id);
        $singers->delete();
        $authors=Author_song::where('song_id',$id);
        $authors->delete();
        $kind=Kind_song::where('song_id',$id);
        $kind->delete();
        $array=$request->input('singer_id');
        for($i=0;$i<count($array);$i++){
            $s=new Singersong;
            $s->song_id=$id;
            $s->artist_id=$array[$i];
            $s->save();
        }

        $arrayAuthor=$request->input('author_id');
        for($i=0;$i<count($arrayAuthor);$i++){
            $s=new Author_song;
            $s->song_id=$id;
            $s->artist_id=$arrayAuthor[$i];
            $s->save();
        }
        
        $arrayKind=$request->input('kind_id');
        for($i=0;$i<count($arrayKind);$i++){
            $s=new Kind_song;
            $s->song_id=$id;
            $s->kind_id=$arrayKind[$i];
            $s->save();
        }
		return redirect('songs')->with('thongbao','Sửa thành công '.$song->song_name);
    }

    public function create(){
        //lấy danh sách Quốc gia
    	$nations=Nation::all();
        //danh sác thể loại
    	$kinds=Kind::all();
        //danh sách nghệ sĩ và xếp theo name
    	$artists=Artist::orderBy('artist_name')->get();
    	return view('songs.song_add',['nations'=>$nations,'kinds'=>$kinds,'artists'=>$artists]);
    }
    public function store(Request $request){

        /*if ($request->hasFile('imagefile') && $request->hasFile('musicfile')) {
            //kiểm tra các điều kiện
            $this->validate($request,
                [

                    'song_name'=>'required|min:4|max:80'
                ],
                [
                    'song_name.required'=>'Chưa nhập Tên bài hát',
                    'song_name.min'=>'Phải nhập lớn hơn 4 ký tự'
                ]);
            //lấy ngày hiện tại
            $date = date_create();
            $song=new Song;

            $song->song_name=$request->song_name;

            //tạo id cho bài hát theo tên và ngày tạo, hàm str_slug tạo chuỗi không dấu
            $idSong=str_slug($request->song_name.' '.date_timestamp_get($date));
            //kiểm tra có file hình và nhạc không
            //lấy file trên request 
            $file = $request->file('imagefile');
            $musicFile= $request->file('musicfile');
            //lấy thể loại file 
            $allowedFileTypes=config('app.allowedFileTypes');
            $maxFileSize=config('app.maxFileSize');
            //lấy tên
            $title = $file->getClientOriginalName();
            $name = $file->getClientOriginalName();
            $nameSong = $idSong;
            
            //copy 1 file vào mục documentos
            $request->file('imagefile')->move('documentos/', $name);
            $request->file('musicfile')->move('documentos/', $nameSong);

            //lấy dữ liệu của file vào biến contents
            $contents = File::get('documentos\\'.$name);
            $contentsSong = File::get('documentos\\'.$nameSong);
            try {
                //đẩy dữ liệu lên
                Storage::cloud()->put($name, $contents);
                Storage::cloud()->put($nameSong, $contentsSong);

                //xóa file tạm trong documentos
                File::delete('documentos\\'.$name);
                File::delete('documentos\\'.$nameSong);

                //lất id của file vừa tải
                $dir = '/';
                $recursive = false; // Get subdirectories also?
                $contents = collect(Storage::cloud()->listContents($dir, $recursive));
                
                
                $f = $contents
                    ->where('type', '=', 'file')
                    ->where('filename', '=', pathinfo($name, PATHINFO_FILENAME))
                    ->where('extension', '=', pathinfo($name, PATHINFO_EXTENSION))
                    ->first(); // there can be duplicate file names!
                $linkImage="https://drive.google.com/uc?id=".$f['path'];
                $fs = $contents
                    ->where('type', '=', 'file')
                    ->where('filename', '=', pathinfo($nameSong, PATHINFO_FILENAME))
                    ->where('extension', '=', pathinfo($nameSong, PATHINFO_EXTENSION))
                    ->first(); // there can be duplicate file names!
                $linkSong="https://drive.google.com/uc?id=".$fs['path']."&export=download";

                $song->song_id=$idSong;
                $song->song_image=$linkImage;
                $song->link=$linkSong;
                $song->nation_id=$request->nation_id;
                $song->uid=Auth::user()->id;
                $song->save();
                 $array=$request->input('singer_id');
                for($i=0;$i<count($array);$i++){
                    $s=new Singersong;
                    $s->song_id=$idSong;
                    $s->artist_id=$array[$i];
                    $s->save();
                }

                $arrayAuthor=$request->input('author_id');
                for($i=0;$i<count($arrayAuthor);$i++){
                    $s=new Author_song;
                    $s->song_id=$idSong;
                    $s->artist_id=$arrayAuthor[$i];
                    $s->save();
                }
                
                $arrayKind=$request->input('kind_id');
                for($i=0;$i<count($arrayKind);$i++){
                    $s=new Kind_song;
                    $s->song_id=$idSong;
                    $s->kind_id=$arrayKind[$i];
                    $s->save();
                }
                //var_dump($array);
                return redirect('songs/add')->with('thongbao','Tạo thành công '.$song->song_name);
            } catch (Exception $e) {
                $message = [
                    'type' => 'error',
                    'text' => 'Error al almcenar el archivo'];
                return view('admin.upload', $message);
               
            }

        }*/
    	
        $date = date_create();
            $song=new Song;

            $song->song_name=$request->song_name;

            //tạo id cho bài hát theo tên và ngày tạo, hàm str_slug tạo chuỗi không dấu
            $idSong=str_slug($request->song_name.' '.date_timestamp_get($date));
            $song->song_id=$idSong;
                $song->song_image=$request->song_image;
                $song->link=$request->link;
                $song->nation_id=$request->nation_id;
                $song->uid=Auth::user()->id;
                $song->save();
                 $array=$request->input('singer_id');
                for($i=0;$i<count($array);$i++){
                    $s=new Singersong;
                    $s->song_id=$idSong;
                    $s->artist_id=$array[$i];
                    $s->save();
                }

                $arrayAuthor=$request->input('author_id');
                for($i=0;$i<count($arrayAuthor);$i++){
                    $s=new Author_song;
                    $s->song_id=$idSong;
                    $s->artist_id=$arrayAuthor[$i];
                    $s->save();
                }
                
                $arrayKind=$request->input('kind_id');
                for($i=0;$i<count($arrayKind);$i++){
                    $s=new Kind_song;
                    $s->song_id=$idSong;
                    $s->kind_id=$arrayKind[$i];
                    $s->save();
                }
    	
                 return redirect('songs')->with('thongbao','Tạo thành công '.$song->song_name);
       
    }
    public function destroy($id){
         $singers=Singersong::where('song_id',$id);
        $singers->delete();
        $authors=Author_song::where('song_id',$id);
        $authors->delete();
        $kind=Kind_song::where('song_id',$id);
        $kind->delete();
        $comment=Comment::where('song_id',$id);
        $comment->delete();
        $his=HistoriesListening::where('song_id',$id);
        $his->delete();
        $song=song::find($id);
        $song->delete();
        return redirect('songs')->with('thongbao','Xóa thành công '.$song->song_name);
    }
    
}
