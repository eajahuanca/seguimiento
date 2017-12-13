<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EjecutorCronograma extends Model
{
    protected $table = 'ejecutorcronogramas';
    protected $fillable = [
        'id',
        'idsolicitud',
        'idcite',
        'eje_mes',
        'eje_corresponde',
        'eje_descripcion',
        'eje_monto',
        'eje_empleo',
        'eje_obs',
        'eje_ejecutado',
        'eje_estado',
        'iduregistra',
        'iduactualiza',
        'created_at',
        'updated_at',
    ];

    public function userRegistra(){
        return $this->belongsTo('App\User', 'iduregistra', 'id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User', 'iduactualiza', 'id');
    }

    public function solicitudes(){
        return $this->belongsTo('App\Solicitud', 'idsolicitud', 'id');
    }
}
