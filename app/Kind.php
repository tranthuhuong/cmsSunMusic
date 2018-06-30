<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    //kết nối với bảng Nation
    protected $table="kindsongs";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
    protected $primaryKey = 'kind_id';

    public function songs(){
        return $this->hasMany('App\Song','kind_id','kind_id');
    }
}
