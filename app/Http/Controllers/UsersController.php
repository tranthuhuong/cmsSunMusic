<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    //
    //
    public function getList(){
    	$users=User::all();
    	return view('users.user_list',['users'=>$users]);
    }
     public function getEdit(){
    	
    }
    public function getAdd(){
    	return view('users.user_add');
    }
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'id'=>'required|min:4|max:80'
    		],
    		[
    			'id.required'=>'Chưa nhập ID',
    			'id.min'=>'Phải nhập lớn hơn 3 ký tự'
    		]);
    	$user=new User;
    	$user->id=$request->id;
		$user->name=$request->name;
		$user->password=bcrypt($request->password);
		$user->email=$request->email;
		$user->jurisdiction_id=$request->jurisdiction;
		$user->save();
		return redirect('users/add')->with('thongbao','Tạo thành công!!');
    }
}
