<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongList extends Model
{
    ///kết nối với bảng Nation
    protected $table="SongLists";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
    protected $primaryKey = 'song_id';
    // protected $primaryKey = ['song_id', 'playlist_id'];
     public $incrementing = false;
      protected $casts = [
        'song_id' => 'String',
        'playlist_id' => 'integer',
    ];
}
