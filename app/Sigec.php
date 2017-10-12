<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sigec extends Model
{
    protected $connection = 'sigec';
    protected $table = "nurs";
    protected $fillable = ['nur','fecha_creacion','username'];
}
