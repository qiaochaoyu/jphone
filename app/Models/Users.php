<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Users extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * 一对多 和签到表
     */
    public function  signs()
    {	
    	//一个用户 对应多个签到  外键为uid 
    	return $this->hasMany('App\Models\Signs','uid');
    }

    /**
     * 一对多 帖子表
     */
   public function topics()
   {
   		return $this->hasMany('App\Models\Topics','uid');
   }

   /**
    * 一对多 回复表
    * 
    */
   public function  replys()
   {
     return $this->hasMany('App\Models\Replys','uid');
   }

  /**
   * 一对多 收藏表
   */
  public function collections()
  {
    return $this->belongsToMany('App\Models\Topics','collections','uid','tid');
  }

  /**
   * 一对多  关注表
   */
  public function  follows()
  {
    return $this->hasMany('App\Models\Follows','uid');
  }

  /** 
   * 一对多 粉丝表
   */
  public function fans()
  {
    return $this->hasMany('App\Models\Fans','uid');
  }

  /**
   * 一对多 公告表
   */
  public function announcements()
  {
    return $this->hasMany('App\Models\Announcements','uid');
  }



















}
