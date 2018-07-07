<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nation;
use App\Kind;
use App\Artist;
use App\Song;
use App\Singersong;
use App\Author_song;
use App\Kind_song;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs=Song::all(); 
        return view('home',['songs'=>$songs]);
    }
   
}
