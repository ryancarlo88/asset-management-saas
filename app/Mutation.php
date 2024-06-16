<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
    protected $table = 'mutations';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function asset()
    {
        return $this->belongsToMany('App\Asset', 'detail_mutations', 'mutations_id', 'fixed_assets_id');
    }

    public function slocation()
    {
        return $this->hasOne('App\Location', 'id', 'slocation');
    }
    public function tlocation()
    {
        return $this->hasOne('App\Location', 'id', 'tlocation');
    }

    public function people()
    {
        return $this->belongsTo('App\People');
    }
}
