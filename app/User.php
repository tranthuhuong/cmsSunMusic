<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    ///kết nối với bảng Nation
    protected $table="Users";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
    protected $casts = [
        'id' => 'String',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image','jurisdiction_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function jurisdiction(){
        return $this->belongsto('App\Jurisdiction','jurisdiction_id','jurisdiction_id');

    }
    public function comments(){
        return $this->hasMany('App\Comment','uid','id');

    }
    public function playlists(){
        return $this->hasMany('App\Playlist','uid','id');

    }

}
