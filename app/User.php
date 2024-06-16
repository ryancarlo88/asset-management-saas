<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'roles_id', 'cpyname', 'address', 'postalcode', 'domain'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->hasMany('App\Role', 'roles_id');
    }

    public function asset()
    {
        return $this->hasMany('App\Asset', 'users_id');
    }

    public function people()

    {
        return $this->hasMany('App\People');
    }

    public function mutation()
    {
        return $this->hasMany('App\Mutation');
    }
}
