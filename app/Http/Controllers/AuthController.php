<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    //nhận dữ liệu
    public function login(Request $request){
    	$username= $request['username'];
    	$password= $request['password'];
    	if(Auth::attempt(['id'=>$username,'password'=>$password])) 
    		{
    			// Lấy thông tin user vừa đăng nhập
				$u = Auth::user();

				// kiểm tra quyền của user
				$jurisdiction = $u->jurisdiction_id;
				// nếu =0 => ban quản trị => thành công
				if($jurisdiction==0) {
                   
					return redirect('/');
                }
				//không thành công
				 else {
				 	Auth::logout();
				 	return view('auth.login',['error'=>'Bạn không thuộc quyền đăng nhập!']);
				 }
    		}
    		//sai thông tin đăng nhập
    		else return view('auth.login',['error'=>'Thông tin không chính xác!']);
    }
    public function logout(Request $request){
        return redirect('/login');
    			
    }
}
