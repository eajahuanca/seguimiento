<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reglamento extends Model
{
    protected $table = 'reglamentos';
    protected $fillable = ['reg_nombre','reg_descripcion','reg_archivo','reg_estado','created_at','updated_at'];

    public function solicitud(){
        return $this->hasMany('App\Solicitud');
    }
}
