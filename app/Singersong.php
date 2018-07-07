<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singersong extends Model
{
    //
    public $table="singer_song";
    public $timestamps=true;
    public $primaryKey = 'artist_id';
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
