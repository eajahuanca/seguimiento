<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = 'entidades';
    protected $fillable = ['param_depto','param_entidad','param_sigla','param_unidad','param_provincia','param_municipio','param_estado','id_uregistra','id_uactualiza'];

    public function userRegistra(){
        return $this->belongsTo('App\User','id_uregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','id_uactualiza','id');
    }

    public function entidad(){
        return $this->hasMany('App\Entidad');
    }
}
