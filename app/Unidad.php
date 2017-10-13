<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';
    protected $fillable = ['id','id_entidad','uni_nombre','uni_estado','created_at','updated_at'];

    public function entidad(){
        return $this->belongsTo('App\Entidad','id_entidad','id');
    }
}
