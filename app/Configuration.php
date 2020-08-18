<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public $timestamps = false;

    protected $table = 'configuration';

    public function photos()
    {
        return $this->hasMany('App\ConfigurationPhoto');
    }
}
