<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    protected $table = 'acciones';
    protected $fillable = ['id','idobjetivo','acc_descripcion','acc_desde','acc_hasta','acc_avance','acc_programado','acc_ejecutado','acc_estado','acc_observacion','iduregistra','iduactualiza','created_at','updated_at'];

    public function objetivos(){
        return $this->belongsTo('App\OEspecifico','idobjetivo','id');
    }
}
