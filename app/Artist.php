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
    public function songs(){
        return $this->hasMany('App\Song','singer_id','artist_id');
    }
    
}

