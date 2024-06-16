<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'peoples';

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit', 'units_id');
    }
    public function mutation()
    {
        return $this->hasMany('App\Mutation');
    }
}
