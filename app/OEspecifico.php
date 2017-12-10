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

    public function metas(){
        return $this->hasMany('App\Meta');
    }

    public function userRegistra(){
        return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','iduactualiza','id');
    }    
}
