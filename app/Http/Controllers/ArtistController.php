<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Nation;
class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    	$artists=Artist::all();
    	return view('artists.Artists_list',['artists'=>$artists]);
    }
    public function edit($id){
    	$artist=Artist::find($id);
    	$nations=Nation::all();
    	return view('artists.Artist_edit',['artist'=>$artist,'nations'=>$nations]);
    }
    public function update(Request $request,$id){
    	$Artist=Artist::find($id);
    	$this->validate($request,
    		[
    			'Artist_name'=>'required|min:3|max:80'
    		],
    		[
    			'Artist_name.required'=>'Chưa nhập Tên Quốc gia',
    			'Artist_name.min'=>'Phải nhập lớn hơn 4 ký tự'
    		]);
    	$Artist->Artist_name=$request->Artist_name;
    	$Artist->cover_img=$request->cover_img;
    	$Artist->nation_id=$request->nation_id;
    	$Artist->artist_image=$request->artist_image;
    	$Artist->info_summary=$request->info_summary;
		$Artist->save();
		return redirect('artists/list')->with('thongbao','Sửa thành công '.$Artist->Artist_name);
    }

    //get add
    public function create(){
    	$nations=Nation::all();
    	return view('artists.Artist_add',['nations'=>$nations]);
    }
    //postAdd
    public function store(Request $request){
    	$this->validate($request,
    		[
    			'name'=>'required|min:3|max:80'
    		],
    		[
    			'name.required'=>'Chưa nhập Tên Thể loại',
    			'name.min'=>'Phải nhập lớn hơn 4 ký tự'
    		]);
    	$Artist=new Artist;
    	$Artist->Artist_name=$request->name;
    	$Artist->cover_img=$request->cover_img;
    	$Artist->nation_id=$request->nation_id;
    	$Artist->artist_image=$request->artist_image;
    	$Artist->info_summary=$request->info_summary;
		$Artist->save();
		return redirect('artists')->with('thongbao','Tạo thành công '.$Artist->Artist_name);
    }

    public function destroy($id){
        $Artist=Artist::find($id);
        $Artist->delete();
        return redirect('artists')->with('thongbao','Xóa thành công '.$Artist->Artist_name);
    }

//getDetail
    public function show($id){
        $artist=Artist::find($id);
        return view('artists.artist_detail',['artist'=>$artist]);
    }
}
