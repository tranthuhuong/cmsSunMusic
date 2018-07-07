<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Author_song extends Model
{
    ///kết nối với bảng Nation
    protected $table="author_song";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
    protected $primaryKey = 'song_id';
    // protected $primaryKey = ['song_id', 'playlist_id'];
     public $incrementing = false;
      protected $casts = [
        'song_id' => 'String',
        'artist_id' => 'integer',
    ];
    public function songs(){
        //'App\singer_song' model trung gian 
        return $this->belongsto('App\Song','song_id','song_id');
    }
    public function artists(){
        //'App\singer_song' model trung gian 
        return $this->belongsto('App\Artist','artist_id','artist_id');
    }
}
