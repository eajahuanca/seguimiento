<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cronograma;
use App\Solicitud;
use Carbon\Carbon;
use Session;

class CronogramaController extends Controller
{
    private $title;
    private $msg;
    private $estado;

    public function __construct(){
        Carbon::setLocale('es');
        $this->estado = "";
        $this->title = "";
        $this->msg = "";
    }

    public function show($idsolicitud){
        $idsolicitud = decrypt($idsolicitud);
        $solicitud = Solicitud::find($idsolicitud);
        $cronograma = Cronograma::where('idsolicitud','=',$solicitud->id)->get();
        return view('admin.cronograma.index')->with('cronograma', $cronograma)->with('solicitud', $solicitud);
    }

    public function store(Request $request)
    {
        try{
            $cronograma = new Cronograma($request->all());
            $cronograma->idsolicitud = decrypt($request->input('idsolicitud'));
            $cronograma->iduregistra = Auth::user()->id;
            $cronograma->iduactualiza = Auth::user()->id;
            $cronograma->save();
            $this->estado = "1";
            $this->title = "Registro de cronograma";
            $this->msg = "Se cargo el cronograma del mes correspondiente de manera correcta";
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = "Error en registro";
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('cronograma.show',encrypt($cronograma->idsolicitud));
    }
}
