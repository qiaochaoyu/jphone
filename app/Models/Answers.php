<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answers extends Model
{
	use SoftDeletes;
    public function users()
    {
    	return $this->belongsTo('App\Models\Users','uid');
    }
}
