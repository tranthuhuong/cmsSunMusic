<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kind;

class KindController extends Controller
{
     //
    public function getList(){
    	$kinds=Kind::all();
    	return view('kinds.kind_list',['kinds'=>$kinds]);
    }
     public function getEdit($id){
    	$kind=Kind::find($id);
    	return view('kinds.kind_edit',['kind'=>$kind]);
    }
    public function postEdit(Request $request,$id){
    	$kind=Kind::find($id);
    	$this->validate($request,
    		[
    			'kind_name'=>'required|min:3|max:80'
    		],
    		[
    			'kind_name.required'=>'Chưa nhập Tên Quốc gia',
    			'kind_name.min'=>'Phải nhập lớn hơn 4 ký tự'
    		]);
    	$kind->kind_name=$request->kind_name;
    	$kind->kind_image=$request->kind_image;
		$kind->save();
		return redirect('kinds/list')->with('thongbao','Sửa thành công '.$kind->kind_name);
    }

    public function getAdd(){
    	return view('kinds.kind_add');
    }
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'kind_name'=>'required|min:3|max:80'
    		],
    		[
    			'kind_name.required'=>'Chưa nhập Tên Thể loại',
    			'kind_name.min'=>'Phải nhập lớn hơn 4 ký tự'
    		]);
    	$kind=new Kind;
    	$kind->kind_name=$request->kind_name;
    	$kind->kind_image=$request->kind_image;
		$kind->save();
		return redirect('kinds/add')->with('thongbao','Tạo thành công '.$kind->kind_name);
    }
    public function getDelete($id){
        $kind=Kind::find($id);
        $kind->delete();
        return redirect('kinds/list')->with('thongbao','Xóa thành công '.$kind->kind_name);
    }
}
