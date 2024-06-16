<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'fixed_assets';
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Category', 'categories_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function mutation()
    {
        return $this->belongsToMany('App\Mutation');
    }

    public function schedule()
    {
        return $this->belongsToMany('App\Schedule');
    }
}
