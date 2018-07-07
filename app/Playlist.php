<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    ///kết nối với bảng Nation
    protected $table="Playlists";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
    protected $primaryKey = 'playlist_id';

    public function user(){
        return $this->belongsTo('App\User','uid','id');

    }
    public function songs(){
    	//'App\Songlist' model trung gian 
        return $this->hasManyThrough('App\Song','App\Songlist','playlist_id','song_id','playlist_id');    
    }
}
