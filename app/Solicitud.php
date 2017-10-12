<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    protected $fillable = ['proy_codigo',
                        'proy_hrsigec',
                        'proy_tipo',
                        'proy_nombre',
                        'proy_objetivo',
                        'proy_justificacion',
                        'id_entidad',
                        'proy_entidad',
                        'proy_sigla',
                        'proy_unidad',
                        'proy_depto',
                        'proy_ciudad',
                        'proy_provincia',
                        'proy_municipio',
                        'id_responsable',
                        'proy_montofona',
                        'proy_montosol',
                        'proy_tiempo',
                        'proy_respaldo',
                        'proy_estado',
                        'id_uregistra',
                        'id_uactualiza'
                    ];
    public function entidad(){
        return $this->belongsTo(App\Entidad,'id_entidad','id');
    }    
    public function responsable(){
        return $this->belongsTo(App\User,'id_responsable','id');
    }

    public function userRegistra(){
        return $this->belongsTo(App\User,'id_uregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo(App\User,'id_uactualiza','id');
    }
}
