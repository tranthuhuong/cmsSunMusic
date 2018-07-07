<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    ///kết nối với bảng Nation
    protected $table="songs";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
     public $primaryKey = 'song_id';
     protected $casts = [
        'song_id' => 'String',
    ];
    /*public function singers(){
        //'App\singer_song' model trung gian 

        return $this->hasManyThrough('App\Artist','App\Singersong','song_id','artist_id','artist_id');
    }*/
   public function singers(){
        //'App\singer_song' model trung gian 
        return $this->hasMany('App\Singersong','song_id','song_id');
    }
    public function authors(){
        //'App\singer_song' model trung gian 
         return $this->hasMany('App\Author_song','song_id','song_id');
    }
    public function kinds(){
        //'App\Kind_song' model trung gian 
         return $this->hasMany('App\Kind_song','song_id','song_id');
    }
    public function user(){
        return $this->belongsTo('App\User','uid','id');
    }
    public function nation(){
        return $this->belongsTo('App\Nation','nation_id','nation_id');
    }
    public function comments(){
        return $this->hasMany('App\Comment','song_id','song_id');
    }
    public function playlists(){
    	//'App\Songlist' model trung gian 
        return $this->hasManyThrough('App\Playlist','App\Songlist','playlist_id','song_id','song_id');
    }

}

