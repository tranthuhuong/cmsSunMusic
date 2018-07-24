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
		$table->renameColumn('short_name', 'description');
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

//nhóm route user
// Route::prefix('users')->group(function () {
//     Route::get('list','UsersController@getList');
//     //users/edit
//     Route::get('edit/{id}','UsersController@getEdit');
// 	Route::post('edit/{id}','UsersController@postEdit');
// 	//users/add
// 	Route::get('add','UsersController@getAdd');
// 	Route::post('add','UsersController@postAdd');
// 	//users/delete/1
// 	Route::get('delete/{id}','UsersController@getDelete');
// 	//users/1/detail
// 	Route::get('{id}/detail','UsersController@getDetail');
// });

Route::resource('users', 'UsersController');

Route::resource('nations', 'NationController');

Route::resource('artists', 'ArtistController');

Route::resource('kinds', 'KindController');

Route::resource('playlists', 'PlaylistController');

Route::resource('songs', 'SongController');

Route::prefix('playlists')->group(function () {
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












//put to drive
Route::get('put', function() {
    Storage::cloud()->put('testh.txt', 'Hello World');
    return 'File was saved to Google Drive';
});
// Shows a list of files in the users' Google drive
Route::get('/files', 'AdminController@files');

Route::get('put-existing', function() {
    $filePath = public_path('..\index.php');
    $fileData = File::get($filePath);
    $filename="hí hí hihi";
    Storage::cloud()->put($filename, $fileData);
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
    $file = $contents
        ->where('type', '=', 'file')
        ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
        ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
        ->first(); // there can be duplicate file names!

    return  $file['path'];
});
Route::get('list', function() {
    $dir = '/';
    $recursive = false; // Có lấy file trong các thư mục con không?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
    return $contents->where('type', '=', 'file');
});
//down load file theo teen
Route::get('get', function() {
    $filename = 'Quan-Trong-La-Than-Thai-OnlyC-Karik.mp3';
    $dir = '/';
    $recursive = false; // Có lấy file trong các thư mục con không?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
    $file = $contents
        ->where('type', '=', 'file')
        ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
        ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
        ->first(); // có thể bị trùng tên file với nhau!
    //return $file; // array with file info
    $rawData = Storage::cloud()->get($file['path']);
    $targetFile = storage_path ("đã tải xuống - {$filename}"); 
    return response($rawData, 200)
        ->header('Content-Type', $file['mimetype'])
        ->header('Content-Disposition', "attachment; filename='$filename'");
});

Route::get('delete', function() {
    $filename = 'test.txt';
    // Tìm file và sử dụng ID (path) của nó để xóa
    $dir = '/';
    $recursive = false; //  Có lấy file trong các thư mục con không?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
    $file = $contents
        ->where('type', '=', 'file')
        ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
        ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
        ->first(); // có thể bị trùng tên file với nhau!
    Storage::cloud()->delete($file['path']);
    return 'File was deleted from Google Drive';
});

// Allows the user to upload new files
Route::get('upload', 'AdminController@upload');
Route::post('upload', 'AdminController@doUploadFileImage');
