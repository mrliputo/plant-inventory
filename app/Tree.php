<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    public $incrementing = false;

    public function species() {
    	return $this->belongsTo('App\Species');
    }
}
