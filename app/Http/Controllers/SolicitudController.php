<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SolicitudRequest;
use App\Solicitud;
use App\Departamento;
use App\Reglamento;
use App\Componente;
use App\Entidad;
use App\User;
use App\Sigec;
use App\Archivo;
use Carbon\Carbon;
use DB;
use Session;
use Storage;

class SolicitudController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        if(Session::get('cite')){
            $sigec = Sigec::select('nur','nombre_remitente','codigo','fecha_creacion')->where('nur','like','20%')->get();
            $responsable = User::select(
                        DB::raw('CONCAT(us_paterno," ",us_materno," ",us_nombre) as responsable'), 'id')
                        ->where('us_estado', 1)
                        ->orderBy('responsable','ASC')
                        ->pluck('responsable','id');
            $entidad = Entidad::where('ent_estado', 1)->orderBy('ent_nombre','ASC')->lists('ent_nombre','id');
            $departamento = Departamento::where('dep_estado',1)->lists('dep_descripcion','id');
            $reglamento = Reglamento::where('reg_estado',1)->lists('reg_nombre','id');
            $componente = Componente::where('com_estado',1)->lists('com_nombre','com_nombre');
            return view('admin.solicitud.registro')
                ->with('responsable',$responsable)
                ->with('sigec', $sigec)
                ->with('entidad', $entidad)
                ->with('departamento', $departamento)
                ->with('reglamento', $reglamento)
                ->with('componente', $componente);
        }else{
            flash('No existe un CITE generado, haga click en nueva Solicitud')->error();
            return redirect()->route('listar.index');
        }
    }

    public function store(SolicitudRequest $request){
        if($request->ajax()){
            try{
                $solicitud = new Solicitud($request->all());      
                $stringMunicipios = "";
                for($position = 0; $position < count($request->input('sol_municipio')); $position++)
                {
                    $stringMunicipios.= $request->input('sol_municipio')[$position].",";
                }
                $stringComponentes = "";
                for($position = 0; $position < count($request->input('sol_componente')); $position++)
                {
                    $stringComponentes.= $request->input('sol_componente')[$position].",";
                }
                $solicitud->sol_municipio = $stringMunicipios;
                $solicitud->sol_componente = $stringComponentes;
                $solicitud->iduregistra = Auth::user()->id;
                $solicitud->iduactualiza = Auth::user()->id;
                if($request->input('tipo')=='0')
                    $solicitud->sol_estado = 'VERIFICACION';
                if($request->input('tipo')=='1')
                    $solicitud->sol_estado = 'POR APROBAR';
                $solicitud->save();
                Session::put('active', '1');
                return response()->json(['success' => 'true']);
            }
            catch(\Exception $ex)
            {
                $valor = $ex->getMessage();
                return response()->json(['success' => $valor]);
            }
        }else{
            flash('No existe un CITE generado, haga click en nueva Solicitud')->error();
            return redirect()->route('listar.index');
        }
    }

    public function getUpdateEstado(Request $request, $idSolicitud){
        if($request->ajax()){
            $solicitud = Solicitud::find($idSolicitud);
            $solicitud->sol_estado = "POR APROBAR";
            $codigo = $solicitud->sol_codigo;
            $solicitud->update();
            $this->storeArchivo($idSolicitud, $codigo);
            
            return response()->json(['success' => 'true']);
        }
        return response()->json(['success' => 'error']);
    }

    public function postUpdateEstadoSolicitud(Request $request){
        if($request->ajax()){
            $solicitud = Solicitud::find($request->idSolicitud);
            $solicitud->sol_estado = "POR APROBAR";
            $codigo = $solicitud->sol_codigo;
            $solicitud->update();
            $archivo = new Archivo($request->all());
            $archivo->idsolicitud = $request->idSolicitud;
            $archivo->idcodigo = $codigo;
            $archivo->ar_estadorecibe = 'POR APROBAR';
            $archivo->ar_estadoenvia = '-';
            $archivo->ar_archivo = '';
            $archivo->ar_detalle = '-';
            $archivo->ar_revisado = '-';
            $archivo->idurecibe = Auth::user()->id;
            $archivo->iduenvia = Auth::user()->id;
            $archivo->save();

            return response()->json(['success' => 'true']);
        }
        return response()->json(['success' => 'error']);
    }
    public function storeArchivo($idSolicitud, $codigo){
        $archivo = new Archivo($idsolicitud);
        $archivo->idsolicitud = $idSolicitud;
        $archivo->idcodigo = $codigo;
        $archivo->ar_estadorecibe = 'POR APROBAR';
        $archivo->ar_estadoenvia = '-';
        $archivo->ar_archivo = '';
        $archivo->ar_detalle = '-';
        $archivo->ar_revisado = '-';
        $archivo->idurecibe = Auth::user()->id;
        $archivo->iduenvia = Auth::user()->id;
        $archivo->save();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
}
