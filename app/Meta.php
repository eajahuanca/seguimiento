<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $table = 'metas';
    protected $fillable = [
        'id',
        'idobjetivo',
        'met_nombre',
        'met_estado',
        'iduregistra',
        'iduactualiza',
        'created_at',
        'updated_at'
    ];

    public function objetivos() {
        return $this->belongsTo('App\OEspecifico','idobjetivo','id');
    }

    public function userRegistra(){
        return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','iduactualiza','id');
    }
}
