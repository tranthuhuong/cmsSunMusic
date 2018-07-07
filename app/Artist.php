<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    ///kết nối với bảng Artists
    protected $table="Artists";
    public $timestamps=true;
    protected $primaryKey = 'artist_id';

    public function nation(){
        return $this->belongsto('App\Nation','nation_id','nation_id');

    }
    /*public function songs(){
        //'App\singer_song' model trung gian 
        return $this->hasManyThrough('App\Song','App\Singersong','artist_id','song_id','song_id');
    }*/
    public function songsinger(){
        //'App\singer_song' model trung gian 
        return $this->hasMany('App\Singersong','artist_id','artist_id');
    }

}

