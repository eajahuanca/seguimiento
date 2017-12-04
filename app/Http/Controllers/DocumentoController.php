<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Documento;
use App\Solicitud;
use Carbon\Carbon;
use Session;

class DocumentoController extends Controller
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
            $documento = new Documento($request->all());
            $documento->idsolicitud = decrypt($request->input('idsolicitud'));
            $documento->iduregistra = Auth::user()->id;
            $documento->iduactualiza = Auth::user()->id;
            $documento->save();
            $this->estado = "1";
            $this->title = "Registro de Documento";
            $this->msg = "Se cargo el archivo de manera correcta";
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = "Error en registro";
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('documento.show',encrypt($documento->idsolicitud));
    }

    public function show($idsolicitud){
        $idsolicitud = decrypt($idsolicitud);
        $solicitud = Solicitud::find($idsolicitud);
        $documento = Documento::where('idsolicitud','=',$solicitud->id)->get();
        return view('admin.documento.index')->with('documento', $documento)->with('solicitud', $solicitud);
    }
    
    public function formdoc($idsolicitud, $position){
        $idsolicitud = decrypt($idsolicitud);
        $tipo = ['ITCP-MAE','ITCP-FONABOSQUE','EDTP-EJECUTOR','EDTP-MAE','SISIN-WEB','VIPFE','SIGEP','LICENCIA-AMBIENTAL','ABT','APERTURA-LIBRETA','COORDINADOR-PROYECTOR','INFORMES-TECNICOS-FONABOSQUE','REGLAMENTO-OPERATIVO','VERIFICACION-CONDICIONES-PREVIAS','SOLICITUD-TRANSFERENCIA-BDP','INFORME-CPYEP'];
        $solicitud = Solicitud::find($idsolicitud);
        return view('admin.documento.create')->with('tipo', $tipo[decrypt($position)])->with('solicitud', $solicitud);
    }
}
