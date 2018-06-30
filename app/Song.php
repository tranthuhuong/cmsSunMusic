<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    ///kết nối với bảng Nation
    protected $table="songs";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
     protected $primaryKey = 'song_id';
     protected $casts = [
        'song_id' => 'String',
    ];
    public function user(){
        return $this->belongsTo('App\User','uid','id');
    }
    public function nation(){
        return $this->belongsTo('App\Nation','nation_id','nation_id');
    }
    public function kind(){
        return $this->belongsTo('App\Kind','kind_id','kind_id');
    }
    public function singer(){        
    	return $this->belongsTo('App\Artist','singer_id','artist_id');
    }
    public function author(){
        return $this->belongsTo('App\Artist','author_id','artist_id');
    }
    public function comments(){
        return $this->hasMany('App\Comment','song_id','song_id');
    }
    public function playlists(){
    	//'App\Songlist' model trung gian 
        return $this->hasManyThrough('App\Playlist','App\Songlist','playlist_id','song_id','song_id');
    }
}

