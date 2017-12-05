<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use File;
use Storage;

class Desembolso extends Model
{
    protected $table = 'desembolsos';
    protected $fillable = [
        'id',
        'idsolicitud',
        'idcodigo',
        'idcronograma',
        'idusolicita',
        'des_fecha_solicitud',
        'des_monto_solicitado',
        'des_archivo_solicitud',
        'des_archivo_nombre_sol',
        'iduaprueba',
        'des_fecha_aprobacion',
        'des_monto_aprobado',
        'des_archivo_aprobado',
        'des_archivo_nombre_apro',
        'des_estado',
        'created_at',
        'updated_at'
    ];

    public function solicitudes(){
        return $this->belongsTo('App\Solicitud', 'idsolicitud','id');
    }

    public function cronogramas(){
        return $this->belongsTo('App\Cronograma','idcronograma','id');
    }

    public function userSolicita(){
        return $this->belongsTo('App\User','idusolicita','id');
    }

    public function userAprueba(){
        return $this->belongsTo('App\User','iduaprueba','id');
    }

    public function setDesArchivoSolicitudAttribute($archivo){
        if($archivo){
            $nuevoNombre = Carbon::now()->year.Carbon::now()->month.Carbon::now()->day
            . "-" .
            Carbon::now()->hour.Carbon::now()->minute.Carbon::now()->second.".".
            $archivo->getClientOriginalExtension();
            $this->attributes['des_archivo_solicitud'] = 'storage/desembolso/'.$nuevoNombre;
            $storage = Storage::disk('desembolso')->put($nuevoNombre, \File::get($archivo));
            $this->attributes['des_archivo_nombre_sol'] = ''.$archivo->getClientOriginalName();
        }
    }

    public function setDesArchivoAprobadoAttribute($archivo){
        if($archivo){
            $nuevoNombre = Carbon::now()->year.Carbon::now()->month.Carbon::now()->day
            . "-" .
            Carbon::now()->hour.Carbon::now()->minute.Carbon::now()->second.".".
            $archivo->getClientOriginalExtension();
            $this->attributes['des_archivo_aprobado'] = 'storage/desembolso/'.$nuevoNombre;
            $storage = Storage::disk('desembolso')->put($nuevoNombre, \File::get($archivo));
            $this->attributes['des_archivo_nombre_apro'] = ''.$archivo->getClientOriginalName();
        }
    }
}
