<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $fillable = ['idprovincia','mun_nombre','mun_estado','created_at','updated_at'];

    public function provincias(){
        return $this->belongsTo('App\Provincia','idprovincia','id');
    }

    public function solicitud(){
        return $this->hasMany('App\Solicitud');
    }
}
