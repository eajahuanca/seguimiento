<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function solicitud(){
        return $this->hasMany('App\Solicitud');
    }

    public function userActualiza(){
        return $this->hasMany('App\Solicitud');
    }

    public function userRegistra(){
        return $this->hasMany('App\Solicitud');
    }
}
