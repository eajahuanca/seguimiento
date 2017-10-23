<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';
    protected $fillable = ['iddepto','pro_nombre','pro_estado','created_at','updated_at'];

    public function solicitud(){
        return $this->hasMany('App\Solicitud');
    }

    public function departamento(){
        return $this->belongsTo('App\Departamento','iddepto','id');
    }
}
