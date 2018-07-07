<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getList(){
    	$comments=Comment::all();
    	return view('comments.comment_list',['comments'=>$comments]);
    }
    
}
