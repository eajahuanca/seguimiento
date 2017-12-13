<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
//use Illuminate\Auth\Reminders\RemindableTrait;
//use Illuminate\Auth\Reminders\RemindableInterface;
//use Zizaco\Entrust\HasRole;

class User extends Authenticatable
//class User extends Eloquent implements UserInterface, RemindableInterface
{
    //use HasRole;
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

    public function municipio(){
        return $this->hasMany('App\Municipio');
    }

    public function ejecutorcronogramas(){
        return $this->hasMany('App\EjecutorCronograma');
    }
}
