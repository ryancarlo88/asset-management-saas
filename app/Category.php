<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'asset_categories';
    public $timestamps = false;

    public function asset()
    {
        return $this->hasMany('App\Asset', 'categories_id');
    }
}
