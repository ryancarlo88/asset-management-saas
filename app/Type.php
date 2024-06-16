<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    public $timestamps = false;

    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
