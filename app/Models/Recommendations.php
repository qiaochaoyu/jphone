<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendations extends Model
{
    public function topics()
    {
    	return $this->belongsTo('App\Models\Topics','tid');
    }
}
