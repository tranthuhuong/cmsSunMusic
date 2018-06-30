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

/*Route::get('/addCollumCover',function(){
	Schema::table('artists',function($table){
		$table -> string('cover_img');
	});
});*/

//truy vấn thông qua model

Route::get('/testQueryDBUser',function(){
	$user=App\User::find('sunsun');
	echo $user->name;
});
Route::get('/lienket',function(){
	//$data=App\User::find('sunsun')->jurisdiction->toArray();
	$data=App\Jurisdiction::where('jurisdiction_id',1)->first()->users->toJson();

	echo $data;
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
    //user/edit
	Route::get('edit','UsersController@getEdit');
	//user/add
	Route::get('add','UsersController@getAdd');
	Route::post('add','UsersController@postAdd');
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
	//nation/edit
	Route::get('edit/{id}','ArtistController@getEdit');
	Route::post('edit/{id}','ArtistController@postEdit');
	//nation/add
	Route::get('add','ArtistController@getAdd');
	Route::post('add','ArtistController@postAdd');
	//nation/delete/1
	Route::get('delete/{id}','ArtistController@getDelete');
});

Route::prefix('songs')->group(function () {
    Route::get('list','SongController@getList');
	//nation/edit
	Route::get('edit/{id}','SongController@getEdit');
	Route::post('edit/{id}','SongController@postEdit');
	//nation/add
	Route::get('add','SongController@getAdd');
	Route::post('add','SongController@postAdd');
	//nation/delete/1
	Route::get('delete/{id}','SongController@getDelete');
});