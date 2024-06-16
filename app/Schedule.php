<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo('App\Type', 'types_id');
    }

    public function asset()
    {
        return $this->belongsToMany('App\Asset', 'detail_schedules', 'schedules_id', 'fixed_assets_id');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'vendors_id');
    }
}
