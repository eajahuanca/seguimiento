<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use File;
use Storage;

class Archivo extends Model
{
    protected $table = "archivos";
    protected $fillable = ['idsolicitud','idcodigo','ar_estadorecibe','idurecibe','ar_estadoenvia','iduenvia','ar_archivo','ar_detalle','ar_revisado','created_at','updated_at'];

    public function solicitudes(){
        return $this->belongsTo('App\Solicitud','idsolicitud','id');
    }

    public function userRecibe(){
        return $this->belongsTo('App\User','idurecibe','id');
    }

    public function userEnvia(){
        return $this->belongsTo('App\User','iduenvia','id');
    }

    public function setArArchivoAttribute($archivo){
        if($archivo){
            $nuevoNombre = Carbon::now()->year.Carbon::now()->month.Carbon::now()->day
            . "-" .
            Carbon::now()->hour.Carbon::now()->minute.Carbon::now()->second.".".
            $archivo->getClientOriginalExtension();
            $this->attributes['ar_archivo'] = 'storage/archivo/'.$nuevoNombre;
            $storage = Storage::disk('archivo')->put($nuevoNombre, \File::get($archivo));
            $this->attributes['ar_revisado'] = ''.$archivo->getClientOriginalName();
            //$this->setArRevisadoAttribute($archivo);
        }
    }
}