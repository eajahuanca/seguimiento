<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = 'entidades';
    protected $fillable = ['id','ent_nombre','ent_sigla','ent_estado','created_at','updated_at'];

    public function solicitud(){
        return $this->hasMany('App\Solicitud');
    }
}
