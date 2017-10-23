<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cite extends Model
{
    protected $table = 'cites';
    protected $fillable = ['id','cit_descripcion','cit_sigla','cit_correlativo','cit_estado','created_at','updated_at'];
}
