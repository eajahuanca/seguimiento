<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = ['ar_nombre','ar_estado','created_at','updated_at'];

    public function usuario(){
        return $this->hasMany('App\User');
    }
}
