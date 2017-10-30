<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
use Storage;
use Carbon\Carbon;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    protected $fillable = ['sol_codigo',
                        'sol_hrsigec',
                        'sol_tipo',
                        'sol_nombre',
                        'sol_objetivo',
                        'sol_justicacion',
                        'identidad',
                        'sol_sigla',
                        'iddepto',
                        'idprovincia',
                        'sol_municipio',
                        'idresponsable',
                        'sol_montofona',
                        'sol_montosol',
                        'sol_montootro',
                        'sol_tiempo',
                        'idreglamento',
                        'sol_respaldo',
                        'sol_ftecnica',
                        'sol_estado',
                        'sol_componente',
                        'iduregistra',
                        'iduactualiza',
                        'created_at',
                        'updated_at'
                    ];
    public function entidad(){
        return $this->belongsTo('App\Entidad','identidad','id');
    }

    public function departamento(){
        return $this->belongsTo('App\Departamento','iddepto','id');
    }

    public function provincia(){
        return $this->belongsTo('App\Provincia','idprovincia','id');
    }

    public function reglamento(){
        return $this->belongsTo('App\Reglamento','idreglamento','id');
    }
    
    public function responsable(){
        return $this->belongsTo('App\User','idresponsable','id');
    }

    public function userRegistra(){
        return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','iduactualiza','id');
    }

    public function setSolRespaldoAttribute($archivo){
        $nuevoNombre = Carbon::now()->year.Carbon::now()->month.Carbon::now()->day
                        . "-" .
                        Carbon::now()->hour.Carbon::now()->minute.Carbon::now()->second.".".
                        $archivo->getClientOriginalExtension();
                        $this->attributes['sol_respaldo'] = 'storage/respaldo/'.$nuevoNombre;
        $storage = Storage::disk('respaldo')->put($nuevoNombre, \File::get($archivo));
    }

    public function setSolFtecnicaAttribute($archivo){
        $nuevoNombre = Carbon::now()->year.Carbon::now()->month.Carbon::now()->day
                        . "-" .
                        Carbon::now()->hour.Carbon::now()->minute.Carbon::now()->second.".".
                        $archivo->getClientOriginalExtension();
                        $this->attributes['sol_ftecnica'] = 'storage/ftecnica/'.$nuevoNombre;
        $storage = Storage::disk('ftecnica')->put($nuevoNombre, \File::get($archivo));
    }
}
