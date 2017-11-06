<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\ArchivoRequest;
use App\Solicitud;
use App\Archivo;
use Carbon\Carbon;
use DB;
use Session;

class ConvenioController extends Controller
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
        $detalle = '';
        if(Auth::user()->us_tipo == 'ADMINISTRADOR DEL SISTEMA'){
            return redirect()->route('dashboard.index');
        }
        if(Auth::user()->us_tipo == 'ASESOR LEGAL'){
            $detalle = "Solicitudes para aprobación por el Asesor Legal para Firma";
            $evaluacion = Solicitud::where('sol_estado','=','LEGAL')->get();
        }

        return view('admin.convenio.index')
            ->with('evaluacion', $evaluacion)
            ->with('detalle', $detalle);
    }

    public function create()
    {
        //
    }

    public function store(ArchivoRequest $request)
    {
        try{
            $estadoAnterior = "";
            $estadoActual = "";
            $archivo = new Archivo($request->all());
            $archivo->idurecibe = Auth::user()->id;
            $archivo->iduenvia = Auth::user()->id;
            $archivo->ar_estadoenvia = '';

            if(Auth::user()->us_tipo == "ASESOR LEGAL"){
                $archivo->ar_estadorecibe = "FIRMADO";
                $archivo->ar_estadoenvia = "FIRMADO";
                $estadoActual = "FIRMADO";
                $estadoAnterior = "LEGAL";
            }
            $archivo->save();

            $updateSolicitud = DB::table('solicitudes')
                ->where('id','=',$request->idsolicitud)
                ->where('sol_codigo','=',$request->idcodigo)
                ->update([
                    'sol_estado' => $estadoActual
                ]);
            $updateArchivo = DB::table('archivos')
                ->where('idsolicitud','=',$request->idsolicitud)
                ->where('idcodigo','=',$request->idcodigo)
                ->where('ar_estadorecibe','=',$estadoAnterior)
                ->update([
                    'ar_estadoenvia' => $estadoActual,
                    'iduenvia' => Auth::user()->id,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            Session::put('estado','1');
            Session::put('title','Solicitud Derivada con Archivo');
            Session::put('msg','Se cargo de manera correcta el archivo y fue derivado a otra instancia la solicitud');
        }catch(\Exception $ex){
            Session::put('estado','2');
            Session::put('title','Solicitud Derivada con Archivo');
            Session::put('msg','Ocurrio un error: '.$ex->getMessage());
        }
        return redirect()->route('convenio.index');
    }

    public function show($id){
        $id = decrypt($id);
        $archivo = Archivo::where('idsolicitud','=',$id)->orderBy('id','ASC')->orderBy('created_at','ASC')->get();
        $solicitud = Solicitud::find($id);
        return view('admin.convenio.line')
            ->with('solicitud', $solicitud)
            ->with('archivo', $archivo);
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $solicitud = Solicitud::find($id);
        return view('admin.convenio.create')
            ->with('idsolicitud', $solicitud->id)
            ->with('idcodigo',$solicitud->sol_codigo);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}