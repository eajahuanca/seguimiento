<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Solicitud;
use App\OEspecifico;
use App\Meta;
use App\Actividad;
use Carbon\Carbon;
use DB;
use Session;

class EjecutorController extends Controller
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

    public function index()
    {       
        $userId = Auth::user()->id;
        $solicitud = Solicitud::where('idcontacto','=',$userId)->where('sol_estado','=','PRIMER DESEMBOLSO APROBADO')->get();
        return view('ejecutor.proyecto')->with('solicitud', $solicitud);
    }

    public function show($idSolicitud)
    {
        $idSolicitud = decrypt($idSolicitud);
        try{
            $proyecto = DB::table('oespecificos')
            ->join('metas', 'oespecificos.id', '=', 'metas.idobjetivo')
            ->join('actividades', 'metas.id', '=', 'actividades.idmeta')
            ->where('oespecificos.idsolicitud','=',$idSolicitud)
            ->where('oespecificos.esp_estado','=',1)
            ->where('metas.met_estado','=',1)
            ->where('actividades.act_estado','=',1)
            ->select(
                'oespecificos.idsolicitud',
                'oespecificos.esp_objetivo',
                'oespecificos.esp_componente',
                'metas.idobjetivo',
                'metas.met_nombre',
                'actividades.id',
                'actividades.idmeta',
                'actividades.act_nombre',
                'actividades.act_cantidad',
                'actividades.act_unidad',
                'actividades.act_otro'
                )
            ->get();
            $solicitud = Solicitud::find($idSolicitud);
            return view('ejecutor.listado')->with('proyecto', $proyecto)->with('solicitud', $solicitud);
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en carga';
            $this->msg = 'Ocurrio un error, no se puede cargar los componentes, metas y actividades';
            return redirect()->route('ejecutor.index');
        }
    }
}
