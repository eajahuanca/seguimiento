<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    protected $table = 'cronogramas';
    protected $fillable = [
                            'id',
                            'idsolicitud',
                            'idcodigo',
                            'cro_desembolso',
                            'cro_fecha_desembolso',
                            'cro_mes',
                            'cro_mes_correspondiente',
                            'cro_programado',
                            'cro_ejecutado',
                            'cro_total_ejecutado',
                            'cro_total_ejecutado_por',
                            'cro_saldo',
                            'cro_saldo_por',
                            'cro_saldo_anterior',
                            'cro_saldo_anterior_por',
                            'cro_estado',
                            'iduregistra',
                            'iduactualiza',
                            'created_at',
                            'updated_at'
                        ];

    public function userRegistra(){
        return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','iduactualiza','id');
    }

    public function solicitudes(){
        return $this->belongsTo('App\Solicitud','idsolicitud','id');
    }
}
