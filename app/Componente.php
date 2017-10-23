<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    protected $table = 'componentes';
    protected $fillable = ['com_nombre','com_descripcion','com_estado','created_at','updated_at'];

    public function solicitud(){
        return $this->hasMany('App\Solicitud');
    }
}
