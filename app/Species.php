<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    public function trees() {
    	return $this->hasMany('App\Tree');
    }
}
