<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer_song extends Model
{
    
    ///kết nối với bảng singer_song
    public $table="singer_song";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
    public $primaryKey = 'song_id';
    // protected $primaryKey = ['song_id', 'playlist_id'];
     public $incrementing = false;
      protected $casts = [
        'song_id' => 'String',
        'artist_id' => 'integer',
    ];
    public function songs(){
        return $this->hasMany('App\Song','song_id','song_id');

    }
    public function artists(){
        return $this->hasMany('App\Artist','artist_id','artist_id');

    }
}
