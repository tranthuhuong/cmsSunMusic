<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\jurisdiction;
class UsersController extends Controller
{
    //
    //
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$users=User::all();
    	return view('users.user_list',['users'=>$users]);
    }
    public function create(){
    	return view('users.user_add');
    }
    public function store(Request $request){
    	$this->validate($request,
    		[
    			'id'=>'required|min:4|max:80'
    		],
    		[
    			'id.required'=>'Chưa nhập ID',
    			'id.min'=>'Phải nhập lớn hơn 3 ký tự'
    		]);
    	$user=new user;
    	$user->id=$request->id;
		$user->name=$request->name;
		$user->password=bcrypt($request->password);
		$user->email=$request->email;
		$user->jurisdiction_id=$request->jurisdiction;
        $user->status_id=0;
		$user->save();
		return redirect('users')->with('thongbao','Tạo thành công!!');
    }

    public function edit($id){

        $user=User::find($id);
        $jurisdictions=Jurisdiction::all();
        return view('users.user_edit',['user'=>$user,'jurisdictions'=>$jurisdictions]);
    }
    public function update(Request $request,$id){
       
        $user=User::find($id);
        $this->validate($request,
            [
                'name'=>'required|min:3|max:80'
            ],
            [
                'name.required'=>'Chưa nhập Tên User',
                'name.min'=>'Phải nhập lớn hơn 3 ký tự'
            ]);
        $user->image=$request->image;
        $user->name=$request->name;
        $user->password=bcrypt($request->password);
        $user->email=$request->email;
        $user->jurisdiction_id=$request->jurisdiction_id;
        $user->save();
        return redirect('users')->with('thongbao','Sửa thành công '.$user->id);
    }
    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        return redirect('users')->with('thongbao','Xóa thành công '.$user->id);
    }
     public function show($id){
        $user=User::find($id);
        return view('users.user_detail',['user'=>$user]);
    }
}
