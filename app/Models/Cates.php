<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\topics;
use App\Models\Users;
use App\Models\Replys;

class Cates extends Model
{
    use SoftDeletes;
   //设置分类表
    public $table = "cates";
    public function topics()
    {
    	return $this->hasMany('App\Models\Topics','cid');
    }
    /**
     * [last_topics description]
     * @param  []
     * @return [array]     [返回该版块下最后一个发表的帖子和发帖人]
     */
    public function last_topics()
    {
    	//获取最后一个发表的帖子模型对象
    	$topics = Topics::where('cid',$this->id)->orderBy('created_at','desc')->first();
    	$uid = $topics['uid'];
    	//获取最后一个帖子发帖人模型对象
    	$users = Users::find($uid);
    	$arr = [];
    	$arr['topics'] = $topics;
    	$arr['users'] = $users;
    	return $arr;
    }
    /**
     * [返回该版块当天的发帖数]
     * @return [int] [帖子条数]
     */
    public function topics_count_today()
    {
    	//获取当天的日期
    	$time = date('Y-m-d',time());
    	$count = Topics::where('cid',$this->id)->where('created_at','like',"$time%")->count();
    	return $count;
    }
    /**
     * [返回当前版块帖子的数]
     * @return [int] [返回版块内帖子数量]
     */
    public function topics_count()
    {
    	$count = Topics::where('cid',$this->id)->count();
    	return $count;
    }
    /**
     * [返回当前版块帖子和回帖数]
     * @return [int] [版块内帖子和回帖数]
     */
    public function topics_replys_count()
    {
    	$count = Topics::where('cid',$this->id)->count();
    	$topics = Topics::where('cid',$this->id)->get();
    	foreach($topics as $k=>$v){
    		$count += Replys::where('tid',$v->id)->count();
    	}
    	return $count;
    }
}
