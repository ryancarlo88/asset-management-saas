<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function mutation()
    {
        return $this->belongsToMany('App\Mutation');
    }
}
