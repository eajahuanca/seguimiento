<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OEspecifico extends Model
{
    protected $table = 'oespecificos';
    protected $fillable = [
        'id',
        'idsolicitud',
        'idcodigo',
        'esp_objetivo',
        'esp_meta',
        'esp_resultado',
        'esp_seguimiento',
        'esp_observacion',
        'esp_estado',
        'iduregistra',
        'iduactualiza',
        'created_at',
        'updated_at'
    ];

    public function solicitudes(){
        return $this->belongsTo('App\Solicitud','idsolicitud','id');
    }
}
