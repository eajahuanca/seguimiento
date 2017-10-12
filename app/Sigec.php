<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sigec extends Model
{
    protected $connection = 'sigec';
    protected $table = "documentos";
    protected $fillable = ['nur','fecha_creacion','nombre_remitente','codigo'];
}
