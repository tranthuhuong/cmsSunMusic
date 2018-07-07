<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kind_song extends Model
{
      ///kết nối với bảng Nation
    protected $table="kind_song";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
    protected $primaryKey = 'song_id';
    // protected $primaryKey = ['song_id', 'playlist_id'];
     public $incrementing = false;
      protected $casts = [
        'song_id' => 'String',
        'kind_id' => 'integer',
    ];
    public function songs(){
        //'App\singer_song' model trung gian 
        return $this->belongsto('App\Song','kind_id','kind_id');
    }
    public function kinds(){
        //'App\singer_song' model trung gian 
        return $this->belongsto('App\Kind','kind_id','kind_id');
    }
}
