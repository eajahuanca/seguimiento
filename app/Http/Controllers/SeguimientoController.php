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

class SeguimientoController extends Controller
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
        if(Auth::user()->us_tipo == 'TECNICO PLANIFICACION'){
            $detalle = "";
            $seguimiento = Solicitud::whereIn('sol_estado',['FIRMADO'])->get();
        }
        return view('admin.seguimiento.index')
            ->with('seguimiento', $seguimiento)
            ->with('detalle', $detalle);
    }

    public function create()
    {
        
    }

    public function store(ArchivoRequest $request)
    {
        //
    }

    public function show($id){
        $id = decrypt($id);
        $archivo = Archivo::where('idsolicitud','=',$id)->orderBy('id','ASC')->orderBy('created_at','ASC')->get();
        $solicitud = Solicitud::find($id);
        return view('admin.seguimiento.line')
            ->with('solicitud', $solicitud)
            ->with('archivo', $archivo);
    }

    public function edit($id)
    {
        $id = decrypt($id);
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
