<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Desembolso;
use App\Solicitud;
use App\Cronograma;
//use App\Presupuesto;
use Carbon\Carbon;
use Session;

class AutorizacionDesembolsoController extends Controller
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

    public function index(){
        $solicitud = Solicitud::where('sol_estado','=','SOLICITUD PRIMER DESEMBOLSO')->get();
        //$techo = Presupuesto::
        return view('admin.autorizacion.index')->with('solicitud', $solicitud);
    }

    public function show($idsolicitud){
        $idsolicitud = decrypt($idsolicitud);
        $solicitud = Solicitud::find($idsolicitud);
        $cronograma = Cronograma::where('cro_mes','=','MES 1')->where('idsolicitud','=',$idsolicitud)->first();
        $desembolso = Desembolso::where('idcronograma','=',$cronograma->id)->where('idsolicitud','=',$idsolicitud)->first();
        return view('admin.autorizacion.create')->with('cronograma', $cronograma)->with('solicitud', $solicitud)->with('desembolso', $desembolso);
    }

    public function update(Request $request, $iddesembolso)
    {
        try{
            $iddesembolso = decrypt($iddesembolso);
            $desembolso = Desembolso::find($iddesembolso);
            $desembolso->fill($request->all());
            $desembolso->idsolicitud = decrypt($request->input('idsolicitud'));
            $desembolso->idcronograma = decrypt($request->input('idcronograma'));
            $desembolso->des_monto_aprobado = $request->input('des_monto_aprobado');
            $desembolso->des_fecha_aprobacion = date('Y-m-d');
            $desembolso->iduaprueba = Auth::user()->id;
            $desembolso->update();
            $this->estado = "1";
            $this->title = "Registro de Desembolso";
            $this->msg = "Sea ha registrado de manera correcta la aprobación del desembolso";

            $solicitud = Solicitud::find($desembolso->idsolicitud);
            $solicitud->sol_estado = 'PRIMER DESEMBOLSO APROBADO';
            $solicitud->update();

        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = "Error en registro";
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('autorizacion.index');
    }
}
