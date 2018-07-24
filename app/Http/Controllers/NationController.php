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
    public function index(){
    	$nations=Nation::all();
    	return view('nations.nation_list',['nations'=>$nations]);
    }
     public function edit($id){
    	$nation=Nation::find($id);
    	return view('nations.nation_edit',['nation'=>$nation]);
    }
    public function update(Request $request,$id){
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
		return redirect('nations')->with('thongbao','Sửa thành công '.$nation->nation_name);
    }

    public function create(){
    	return view('nations.nation_add');
    }
    public function store(Request $request){
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
		return redirect('nations/create')->with('thongbao','Tạo thành công '.$nation->nation_name);
    }
    public function destroy($id){
        $nation=Nation::find($id);
        $nation->delete();
        return redirect('nations')->with('thongbao','Xóa thành công '.$nation->nation_name);
    }
}
