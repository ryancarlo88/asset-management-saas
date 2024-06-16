<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function people()
    {
        return $this->hasMany('App\People');
    }
}
