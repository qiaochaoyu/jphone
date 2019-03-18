<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{

	public function users()
	{
		return $this->hasOne('App\Users','id','uid');
	}
}
