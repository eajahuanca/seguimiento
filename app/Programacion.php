<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
    protected $table = 'programaciones';
    protected $fillable = [
        'id',
        'idsolicitud',
        'idactividad',
        'pro_descripcion',
        'pro_unidad',
        'pro_cantidad',
        'pro_mes',
        'pro_poblacion',
        'pro_tematica',
        'pro_personas',
        'pro_material',
        'pro_obs',
        'pro_estado',
        'iduregistra',
        'iduactualiza',
        'created_at',
        'updated_at'
    ];

    public function solicitudes(){
        return $this->belongsTo('App\Solicitud','idsolicitud','id');
    }

    public function actividades(){
        return $this->belongsTo('App\Actividad','idactividad','id');
    }
}
