<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Replys;
use App\Models\Users;

class Topics extends Model
{
	use SoftDeletes;
    public function users()
    {
    	return $this->belongsTo('App\Models\Users','uid');
    }
    public function replys()
    {
    	return $this->hasMany('App\Models\Replys','tid');
    }
    public function cates()
    {
    	return $this->belongsTo('App\Models\Cates','cid');
    }

    public function collection()
    {
        return $this->belongsToMany('App\Models\Users','collections','tid','uid');
    }
    /**
    * 获取帖子的最后一个回帖
    * @param int $id 帖子id
    * @return 最后一个回帖的详细信息
    */
    public function get_last_replys($id)
    {
        $arr = [];
        $replys = Replys::where('tid',$id)->orderBy('created_at','desc')->first();
        $time = $replys['created_at'];
        $user = Users::where('id',$replys['uid'])->first();
        $user_name = $user['nickname'];
        $arr['time'] = $time;
        $arr['user_name'] = $user_name;
        return $arr;
    }
}

