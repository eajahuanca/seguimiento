<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EjecutorProgramacion extends Model
{
    protected $table = 'ejecutorprogramaciones';
    protected $fillable = [
        'id',
        'idsolicitud',
        'idactividad',
        'form_formulario',
        'form_mes',
        'form_mescorresponde',
        'form_gestion',
        'form_descripcion',
        'form_cantidad',
        'form_unidad',
        'form_poblacion',
        'form_tematica',
        'form_personas',
        'form_apoyo',
        'form_especie',
        'form_plantin',
        'form_proporcion',
        'form_area',
        'form_sistema',
        'form_familia',
        'form_programado',
        'form_programado2',
        'form_avance',
        'form_avance2',
        'form_acumulado',
        'form_acumulado2',
        'form_pavance',
        'form_pavance2',
        'form_saldo',
        'form_saldo2',
        'form_psaldo',
        'form_psaldo2',
        'form_saldoanterior',
        'form_saldoanterior2',
        'form_psaldoanterior',
        'form_psaldoanterior2',
        'form_obs',
        'form_obsgeneral',
        'form_estado',
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

    public function userRegistra(){
        return $this->belognsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
        return $this->belognsTo('App\User','iduactualiza','id');
    }
}
