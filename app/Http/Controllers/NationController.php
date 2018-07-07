<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nation;
class NationController extends Controller
{
     //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getList(){
    	$nations=Nation::all();
    	return view('nations.nation_list',['nations'=>$nations]);
    }
     public function getEdit($id){
    	$nation=Nation::find($id);
    	return view('nations.nation_edit',['nation'=>$nation]);
    }
    public function postEdit(Request $request,$id){
    	$nation=Nation::find($id);
    	$this->validate($request,
    		[
    			'nation_name'=>'required|min:4|max:80'
    		],
    		[
    			'nation_name.required'=>'Chưa nhập Tên Quốc gia',
    			'nation_name.min'=>'Phải nhập lớn hơn 4 ký tự'
    		]);
    	$nation->nation_name=$request->nation_name;
		$nation->save();
		return redirect('nations/list')->with('thongbao','Sửa thành công '.$nation->nation_name);
    }

    public function getAdd(){
    	return view('nations.nation_add');
    }
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'nation_name'=>'required|min:4|max:80'
    		],
    		[
    			'nation_name.required'=>'Chưa nhập Tên Quốc gia',
    			'nation_name.min'=>'Phải nhập lớn hơn 4 ký tự'
    		]);
    	$nation=new Nation;
    	$nation->nation_name=$request->nation_name;
		$nation->save();
		return redirect('nations/add')->with('thongbao','Tạo thành công '.$nation->nation_name);
    }
    public function getDelete($id){
        $nation=Nation::find($id);
        $nation->delete();
        return redirect('nations/list')->with('thongbao','Xóa thành công '.$nation->nation_name);
    }
}
