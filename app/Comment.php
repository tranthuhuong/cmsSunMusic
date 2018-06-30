<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    ///kết nối với bảng Nation
    protected $table="comments";
    //bật/tắt chế độ timestamps
    public $timestamps=true;
    protected $primaryKey = 'comment_id';

    public function user(){
        return $this->belongsTo('App\User','uid','id');

    }
    public function song(){
        return $this->belongsTo('App\Song','song_id','song_id');
    }
}
