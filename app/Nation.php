<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    ///kết nối với bảng Nation
    protected $table="nations";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
    protected $primaryKey = 'nation_id';

    public function artists(){
        return $this->hasMany('App\Artist','nation_id','nation_id');

    }
    public function songs(){
        return $this->hasMany('App\Song','nation_id','nation_id');
    }
}
