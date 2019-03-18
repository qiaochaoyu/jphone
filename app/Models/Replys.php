<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Replys extends Model
{
	use SoftDeletes;
    public function users()
    {
    	return $this->belongsTo('App\Models\Users','uid');
    }
    public function answers()
    {
    	return $this->hasMany('App\Models\Answers','rid');
    }
}
