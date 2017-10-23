<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $fillable = ['car_nombre','car_estado','created_at','updated_at'];

    public function usuario(){
        return $this->hasMany('App\User');
    }
}
