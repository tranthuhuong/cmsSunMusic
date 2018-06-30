<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurisdiction extends Model
{
   //kết nối với bảng jurisdiction
    protected $table="jurisdiction";
    //bật/tắt chế độ timestamps
    public $timestamps=true;

    public function users(){
        return $this->hasMany('App\User','jurisdiction_id','jurisdiction_id');

    }
}
