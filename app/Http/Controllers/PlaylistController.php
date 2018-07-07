<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use App\Songlist;
use App\User;
use App\Song;
use Auth;
use DB;
class PlaylistController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getList(){
    	$playlists=Playlist::all();
    	return view('playlists.playlist_list',['playlists'=>$playlists]);
    }

    public function getAdd(){
    	return view('playlists.playlist_add');
    }
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'playlist_name'=>'required|min:3|max:80'
    		],
    		[
    			'playlist_name.required'=>'Chưa nhập Tên Thể loại',
    			'playlist_name.min'=>'Phải nhập lớn hơn 4 ký tự'
    		]);
    	$playlist=new Playlist;
    	$playlist->name_playlist=$request->playlist_name;
    	$playlist->playlist_image=$request->playlist_image;
    	$playlist->uid=Auth::user()->id;

		$playlist->save();
		return redirect('playlists/add')->with('thongbao','Tạo thành công '.$playlist->name_playlist);
    }
     public function getDelete($id){
        $playlist=Playlist::find($id);
        $playlist->delete();
        return redirect('playlists/list')->with('thongbao','Xóa thành công '.$playlist->playlists_id);
    }

    public function getEdit($id){
        $playlist=Playlist::find($id);
        return view('playlists.playlist_edit',['playlist'=>$playlist]);
    }
    public function postEdit(Request $request,$id){
        $playlist=Playlist::find($id);
        $this->validate($request,
            [
    			'playlist_name'=>'required|min:3|max:80'
    		],
    		[
    			'playlist_name.required'=>'Chưa nhập Tên Thể loại',
    			'playlist_name.min'=>'Phải nhập lớn hơn 4 ký tự'
    		]);
        $playlist->name_playlist=$request->playlist_name;
    	$playlist->playlist_image=$request->playlist_image;
        $playlist->save();
        return redirect('playlists/list')->with('thongbao','Sửa thành công '.$playlist->name_playlist);
    }
    public function getDetail($id){
    	$playlist=Playlist::find($id);
    	$songs=Song::all();
        // $songs= DB:: table('songs')
        //     ->join('songlists','songlists.song_id', '=', 'songs.song_id')
        //    // ->where('songlists.playlist_id', $id)
        //     ->whereNotIn('songs.song_id', DB::raw("SELECT song_id FROM songlist WHERE playlist_id= ($id)"))
        //     ->select('songs.song_id','songs.song_name','songs.singer_id')
        //     ->get();
    	return view('playlists.playlist_detail',['playlist'=>$playlist,'songs'=>$songs]);
    }
    
    //function add song to playlist
    public function postAddSong(Request $request,$id){
    	$playlist=Playlist::find($id);
    	$songs=Song::all();	
		$songlist=new Songlist;

    	$songlist->song_id=$request->song_id;
    	$songlist->playlist_id=$id;
    	$songlist->save();

    	return redirect('playlists/'.$id.'/detail')->with('messList','Thêm thành công');

    }
        //function delete song in playlist
         public function getDeleteSong($idList,$idSong){
     	$playlist=Playlist::find($idList);
    	$songs=Song::all();	
        $songlist=Songlist::where('song_id', $idSong)
          ->where('playlist_id', $idList)
          ->delete();
        return redirect('playlists/'.$idList.'/detail')->with('messList','Xóa thành công');
    }

}
