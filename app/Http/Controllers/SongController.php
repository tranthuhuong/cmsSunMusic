<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nation;
use App\Kind;
use App\Artist;
use App\Song;
use Auth;
class SongController extends Controller
{
     //
    public function getList(){
    	$songs=Song::all();
    	return view('songs.song_list',['songs'=>$songs]);
    }
     public function getEdit($id){
    	$song=Song::where('song_id', $id)->first();
    	$nations=Nation::all();
    	$kinds=Kind::all();
    	$artists=Artist::orderBy('artist_id')->get();
    	return view('songs.song_edit',['song'=>$song, 'nations'=>$nations,'kinds'=>$kinds,'artists'=>$artists]);
    }
    public function postEdit(Request $request,$id){
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
    	$idSong=str_slug($request->song_name.' '.$request->singer_id,'-');
    	$song->song_id=$idSong;
    	$song->song_image=$request->song_image;
    	$song->singer_id=$request->singer_id;
    	$song->author_id=$request->author_id;
    	$song->kind_id=$request->kind_id;
    	$song->link=$request->link;
    	$song->nation_id=$request->nation_id;  	
		$song->save();
		return redirect('songs/list')->with('thongbao','Sửa thành công '.$song->song_name);
    }

    public function getAdd(){
    	$nations=Nation::all();
    	$kinds=Kind::all();
    	$artists=Artist::orderBy('artist_id')->get();
    	return view('songs.song_add',['nations'=>$nations,'kinds'=>$kinds,'artists'=>$artists]);
    }
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'song_name'=>'required|min:4|max:80'
    		],
    		[
    			'song_name.required'=>'Chưa nhập Tên Quốc gia',
    			'song_name.min'=>'Phải nhập lớn hơn 4 ký tự'
    		]);
    	$song=new Song;
    	$song->song_name=$request->song_name;
    	$idSong=str_slug($request->song_name.' '.$request->singer_id,'-');
    	$song->song_id=$idSong;
    	$song->song_image=$request->song_image;
    	$song->singer_id=$request->singer_id;
    	$song->author_id=$request->author_id;
    	$song->kind_id=$request->kind_id;
    	$song->link=$request->link;
    	$song->nation_id=$request->nation_id;
    	$song->uid=Auth::user()->id;
    	

		$song->save();
		return redirect('songs/add')->with('thongbao','Tạo thành công '.$song->song_name);
    }
    public function getDelete($id){
        $song=song::find($id);
        $song->delete();
        return redirect('songs/list')->with('thongbao','Xóa thành công '.$song->song_name);
    }
}
