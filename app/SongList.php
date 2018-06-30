<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongList extends Model
{
    ///kết nối với bảng Nation
    protected $table="SongLists";
    //bật/tắt chế độ timestamps
    public $timestamps=true;

}
