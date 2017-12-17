<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';
    protected $fillable = [
        'id',
        'idmeta',
        'act_nombre',
        'act_cantidad',
        'act_unidad',
        'act_otro',
        'act_obs',
        'act_estado',
        'iduregistra',
        'iduactualiza',
    ];

    public function ejecutorprogramaciones(){
        return $this->hasMany('App\EjecutorProgramacion');
    }

    public function metas() {
        return $this->belongsTo('App\Meta','idmeta','id');
    }

    public function programacions() {
        return $this->hasMany('App\Programacion');
    }

    public function userRegistra(){
        return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','iduactualiza','id');
    }
}
