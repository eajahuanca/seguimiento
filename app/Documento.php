<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use File;
use Storage;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $fillable = [
                            'id',
                            'idsolicitud',
                            'idcodigo',
                            'doc_tipo',
                            'doc_archivo',
                            'doc_nombre',
                            'doc_codigo',
                            'doc_req',
                            'doc_cumple',
                            'doc_obs',
                            'doc_estado',
                            'iduregistra',
                            'iduactualiza',
                            'created_at',
                            'updated_at'
                        ];
    
    public function solicitudes(){
        return $this->belongsTo('App\Solicitud','idsolicitud','id');
    }

    public function userRegistra(){
        return $this->belongsTo('App\User','iduregistra','id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','iduactualiza','id');
    }

    public function setDocArchivoAttribute($archivo){
        if($archivo){
            $nuevoNombre = Carbon::now()->year.Carbon::now()->month.Carbon::now()->day
                            . "-" .
                            Carbon::now()->hour.Carbon::now()->minute.Carbon::now()->second.".".
            $archivo->getClientOriginalExtension();
            $this->attributes['doc_archivo'] = 'storage/documento/'.$nuevoNombre;
            $storage = Storage::disk('documento')->put($nuevoNombre, \File::get($archivo));
            $this->attributes['doc_nombre'] = $archivo->getClientOriginalName();
        }
    }
}
