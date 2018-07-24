<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriesListening extends Model
{
     //kết nối với bảng Nation
    protected $table="histories_listening";
    //bật/tắt chế độ timestamps
    public $timestamps=false;
    protected $primaryKey = 'song_id';
    protected $casts = [
        'song_id' => 'String',
    ];

    public function infoSong(){
        return $this->belongsto('App\Song','song_id','song_id');

    }
}
