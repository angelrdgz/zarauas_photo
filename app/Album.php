<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = false;

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
