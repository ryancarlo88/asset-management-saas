<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';

    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
