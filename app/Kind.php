<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    //kết nối với bảng Nation
    protected $table="kinds";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
    protected $primaryKey = 'kind_id';

    /*public function songs(){
        return $this->hasManyThrough('App\Song','App\Kind_song','kind_id','song_id','kind_id');
    }*/
    /*public function songsinger(){
        //'App\singer_song' model trung gian 
        return $this->belongsto('App\Singersong','artist_id','artist_id');
    }*/
    public function songs(){
        //'App\singer_song' model trung gian 
        return $this->hasMany('App\Kind_song','kind_id','kind_id');
    }
}

