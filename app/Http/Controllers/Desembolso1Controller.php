<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Desembolso;
use App\Solicitud;
use App\Cronograma;
use Carbon\Carbon;
use Session;

class Desembolso1Controller extends Controller
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

    public function store(Request $request)
    {
        try{
            $desembolso = new Desembolso($request->all());
            $desembolso->idsolicitud = decrypt($request->input('idsolicitud'));
            $desembolso->idcronograma = decrypt($request->input('idcronograma'));
            $desembolso->des_monto_solicitado = decrypt($request->input('des_monto_solicitado'));
            $desembolso->des_fecha_solicitud = date('Y-m-d');
            $desembolso->idusolicita = Auth::user()->id;
            $desembolso->iduaprueba = Auth::user()->id;
            $desembolso->save();
            $this->estado = "1";
            $this->title = "Registro de Desembolso";
            $this->msg = "Se cargo el archivo de solicitud del primer desembolso de manera correcta";

            $solicitud = Solicitud::find($desembolso->idsolicitud);
            $solicitud->sol_estado = 'SOLICITUD PRIMER DESEMBOLSO';
            $solicitud->update();
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = "Error en registro";
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('desembolso1.show',encrypt($desembolso->idsolicitud));
    }

    public function show($idsolicitud){
        $idsolicitud = decrypt($idsolicitud);
        $solicitud = Solicitud::find($idsolicitud);
        $cronograma = Cronograma::where('cro_mes','=','MES 1')->where('idsolicitud','=',$idsolicitud)->first();
        return view('admin.desembolso1.index')->with('cronograma', $cronograma)->with('solicitud', $solicitud);
    }
}
