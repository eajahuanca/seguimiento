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
use Carbon\Carbon;
use DB;
use Session;

class SolicitudController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index()
    {
        if(Session::get('cite')){
            $sigec = Sigec::select('nur','nombre_remitente','codigo','fecha_creacion')->where('nur','like','20%')->get();
            $responsable = User::select(
                        DB::raw('CONCAT(us_paterno," ",us_materno," ",us_nombre) as responsable'), 'id')
                        ->where('us_estado', 1)
                        ->orderBy('responsable','ASC')
                        ->pluck('responsable','id');
            $entidad = Entidad::where('ent_estado', 1)->orderBy('ent_nombre','ASC')->lists('ent_nombre','ent_nombre');
            $departamento = Departamento::lists('dep_descripcion','id');
            $reglamento = Reglamento::lists('reg_nombre','id');
            $componente = Componente::lists('com_nombre','com_nombre');
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

    public function store(SolicitudRequest $request)
    {
        if($request->ajax())
        {
            try
            {
                $solicitud = new Solicitud($request->all());
                $stringMunicipios = "";
                for($position = 0; $position < count($request->input('sol_municipio')); $position++)
                {
                    $stringMunicipios.= $request->input('sol_municipio')[$position].",";
                }
                $solicitud->sol_municipio = $stringMunicipios;
                $solicitud->iduregistra = Auth::user()->id;
                $solicitud->iduactualiza = Auth::user()->id;
                $solicitud->sol_estado = 'TRANSCRIPCION';
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
