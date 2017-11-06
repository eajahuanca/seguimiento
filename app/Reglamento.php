<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
use Storage;
use Carbon\Carbon;

class Reglamento extends Model
{
    protected $table = 'reglamentos';
    protected $fillable = ['reg_nombre','reg_descripcion','reg_archivo','reg_estado','created_at','updated_at'];

    public function solicitud(){
        return $this->hasMany('App\Solicitud');
    }

    public function setRegArchivoAttribute($archivo){
        if($archivo){
            $nuevoNombre = Carbon::now()->year.Carbon::now()->month.Carbon::now()->day
                        . "-" .
                        Carbon::now()->hour.Carbon::now()->minute.Carbon::now()->second.".".
                        $archivo->getClientOriginalExtension();
                        $this->attributes['reg_archivo'] = 'storage/reglamento/'.$nuevoNombre;
            $storage = Storage::disk('reglamento')->put($nuevoNombre, \File::get($archivo));
        }
    }
}
