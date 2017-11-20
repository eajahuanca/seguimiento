<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenada extends Model
{
    protected $table = 'coordenadas';
    protected $fillable = ['id','idobjetivo','coor_x_origin','coor_y_origin','coor_x_map','coor_y_map','coor_estado','iduregistra','iduactualiza'];

    public function objetivos(){
        return $this->belongsTo('App\OEspecifico','idobjetivo','id');
    }
}
