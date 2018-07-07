<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Trang chủ */
/*Route::get('/', function () {
    return view('welcome');
});*/
/*Trang login*/
/*Route::get('/login',function(){
	return view('login');
});*/

//Route trỏ đến Controller AuthController gọi hàm login
Route::post('checklogin','AuthController@login')->name('checklogin');

Route::get('/addCollum',function(){
	Schema::table('kinds',function($table){
		$table -> string('short_name');
	});
});

//truy vấn thông qua model

Route::get('/testQueryDBUser',function(){
	$user=App\User::find('sunsun');
	echo $user->name;
});
	Route::get('/lienket',function(){
		//$data=App\User::find('sunsun')->jurisdiction->toArray();
		$singers=App\playlist::where('playlist_id',1)->first()->songs;
		 /*$singers = DB::table('Artists')
	            ->join('Singer_song', 'Singer_song.artist_id', '=', 'Artists.artist_id')
	            ->join('songs', 'songs.song_id', '=', 'Singer_song.song_id')
	            ->where('songs.song_id','until-you-1530804969')
	            ->select('Artists.*')
	            ->get();*/
	  //  $singers=App\song::where('song_id','until-you-1530804969')->first()->singers;
		echo $singers ;
	});

Auth::routes();

Route::get('/', 'HomeController@index')/*->name('home')*/;
Route::get('/home', 'HomeController@index')->name('home');
//Route trỏ đến Controller AuthController gọi hàm login
Route::POST('login','AuthController@login')->name('check-login');
//route logout
Route::get('logout','AuthController@logout')->name('logout');

Route::get('/test',function(){
	return view('users.user_edit');
});
//nhóm route user
Route::prefix('users')->group(function () {
    Route::get('list','UsersController@getList');
    //users/edit
    Route::get('edit/{id}','UsersController@getEdit');
	Route::post('edit/{id}','UsersController@postEdit');
	//users/add
	Route::get('add','UsersController@getAdd');
	Route::post('add','UsersController@postAdd');
	//users/delete/1
	Route::get('delete/{id}','UsersController@getDelete');
	//users/1/detail
	Route::get('{id}/detail','UsersController@getDetail');
});

Route::prefix('kinds')->group(function () {
    Route::get('list','KindController@getList');
	//kinds/edit
	Route::get('edit/{id}','KindController@getEdit');
	Route::post('edit/{id}','KindController@postEdit');
	//kinds/add
	Route::get('add','KindController@getAdd');
	Route::post('add','KindController@postAdd');
	//kinds/delete/1
	Route::get('delete/{id}','KindController@getDelete');
});

Route::prefix('nations')->group(function () {
    Route::get('list','NationController@getList');
	//nation/edit
	Route::get('edit/{id}','NationController@getEdit');
	Route::post('edit/{id}','NationController@postEdit');
	//nation/add
	Route::get('add','NationController@getAdd');
	Route::post('add','NationController@postAdd');
	//nation/delete/1
	Route::get('delete/{id}','NationController@getDelete');
});

Route::prefix('artists')->group(function () {
    Route::get('list','ArtistController@getList');
	//artists/edit
	Route::get('edit/{id}','ArtistController@getEdit');
	Route::post('edit/{id}','ArtistController@postEdit');
	//artists/add
	Route::get('add','ArtistController@getAdd');
	Route::post('add','ArtistController@postAdd');
	//artists/delete/1
	Route::get('delete/{id}','ArtistController@getDelete');
	//artists/1/detail
	Route::get('{id}/detail','ArtistController@getDetail');
});

Route::prefix('songs')->group(function () {
    Route::get('list','SongController@getList');
	//songs/edit
	Route::get('edit/{id}','SongController@getEdit');
	Route::post('edit/{id}','SongController@postEdit');
	//songs/add
	Route::get('add','SongController@getAdd');
	Route::post('add','SongController@postAdd');
	//songs/delete/1
	Route::get('delete/{id}','SongController@getDelete');
	//songs/1/detail
	Route::get('{id}/detail','SongController@getDetail');
});

Route::prefix('playlists')->group(function () {
    Route::get('list','PlaylistController@getList');
	//playlist/edit
	Route::get('edit/{id}','PlaylistController@getEdit');
	Route::post('edit/{id}','PlaylistController@postEdit');
	//playlist/add
	Route::get('add','PlaylistController@getAdd');
	Route::post('add','PlaylistController@postAdd');
	//playlist/delete/1
	Route::get('delete/{id}','PlaylistController@getDelete');
	//playlist/1/detail
	Route::get('{id}/detail','PlaylistController@getDetail');
	//add song to playlist
	Route::post('{id}/addSong','PlaylistController@postAddSong');
	//delete song in playlist
	Route::get('{idList}/delSong/{idSong}','PlaylistController@getDeleteSong');
});

Route::prefix('comments')->group(function () {
    Route::get('list','CommentController@getList');
	//playlist/delete/1
	Route::get('delete/{id}','CommentController@getDelete');
});
