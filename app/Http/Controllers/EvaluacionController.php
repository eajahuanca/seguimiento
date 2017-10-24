<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\ArchivoRequest;
use App\Solicitud;
use Carbon\Carbon;
use DB;
use Session;

class EvaluacionController extends Controller
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
        if(Auth::user()->us_tipo == 'ADMINISTRADOR DEL SISTEMA'){
            return redirect()->route('dashboard.index');
        }
        if(Auth::user()->us_tipo == 'TECNICO PLANIFICACION'){
            $evaluacion = Solicitud::get();
        }
        if(Auth::user()->us_tipo == 'JEFE PLANIFICACION'){
            $evaluacion = Solicitud::where('sol_estado','=','POR APROBAR')->get();
        }
        if(Auth::user()->us_tipo == 'ADMINISTRACION FINANCIERA'){
            $evaluacion = Solicitud::where('sol_estado','=','APROBADO')->get();
        }
        if(Auth::user()->us_tipo == 'ASESOR LEGAL'){
            $evaluacion = Solicitud::where('sol_estado','=','FINANZAS')->get();
        }
        return view('admin.evaluacion.index')
            ->with('evaluacion', $evaluacion);
    }

    public function create()
    {
        //
    }

    public function store(ArchivoRequest $request)
    {
        //
    }

    public function show($id){
        $solicitud = Solicitud::find($id);
        return view('admin.evaluacion.line')
            ->with('solicitud', $solicitud);
    }

    public function edit($id)
    {
        $solicitud = Solicitud::find($id);
        return view('admin.evaluacion.create')
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
