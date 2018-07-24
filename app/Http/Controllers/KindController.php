<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Kind;
use Illuminate\Support\Facades\App;
class KindController extends Controller
{
     //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$kinds=Kind::all();
    	return view('kinds.kind_list',['kinds'=>$kinds]);
    }
     public function edit($id){
    	$kind=Kind::find($id);
    	return view('kinds.kind_edit',['kind'=>$kind]);
    }
    public function update(Request $request,$id){
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
		return redirect('kinds')->with('thongbao','Sửa thành công '.$kind->kind_name);
    }

    public function create(){
    	return view('kinds.kind_add');
    }
    public function store(Request $request){
    	$this->validate($request,
    		[
    			'kind_name'=>'required|min:3|max:80'
    		],
    		[
    			'kind_name.required'=>'Chưa nhập Tên Thể loại',
    			'kind_name.min'=>'Phải nhập lớn hơn 4 ký tự'
    		]);
    	$kind=new Kind;
    	// $kind->kind_name= $controller = App::make('\App\Http\Controllers\AdminController');
     //    $data = $controller->callAction('doUploadFileImage', "jo"->"jj");
         $controller = new AdminController;

         $data=$controller->doUploadFileImage($request);
        //  $data =redirect()->action('AdminController@doUploadFileImage', array(
        // 'request'  => $request));
        $kind->kind_name= $request->kind_name;
    	$kind->kind_image=$data;
        $kind->description= $request->description;
		$kind->save();
		return redirect('kinds/create')->with('thongbao','Tạo thành công '.$kind->kind_name);
    }
    public function destroy($id){
        $kind=Kind::find($id);
        $kind->delete();
        return redirect('kinds')->with('thongbao','Xóa thành công '.$kind->kind_name);
    }

}
