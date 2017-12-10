<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;

use App\Http\Requests;
use App\OEspecifico;
use App\Meta;
use App\Actividad;
use Carbon\Carbon;
use Session;

class ActividadController extends Controller
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

    public function edit($id){
        try{
            $id = decrypt($id);
            $meta = Meta ::find($id);
            $objetivo = OEspecifico::find($meta->idobjetivo);
            $actividad = Actividad::orderBy('created_at','ASC')->where('idmeta','=',$meta->id)->get();
            return view('admin.actividad.create')->with('objetivo',$objetivo)->with('meta',$meta)->with('actividad',$actividad);
        }catch(\Exception $ex){
            flash('error', "Ocurrió el siguiente error: ".$ex->getMessage());
            return Redirect::back();
        }
    }

    public function store(Request $request){
        try{
            $actividad = new Actividad($request->all());
            $actividad->idmeta = decrypt($request->idmeta);
            $actividad->iduregistra = Auth::user()->id;
            $actividad->iduactualiza = Auth::user()->id;
            $actividad->save();
            $meta = Meta::find($actividad->idmeta);
            $this->estado = "1";
            $this->title = "Registro de la Actividad";
            $this->msg = "Los datos de la Actividad, se registraron de manera correcta";
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = "Error en registro";
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('actividad.edit',encrypt($meta->id));
    }

    public function getActividad(Request $request, $idMeta){
        if($request->ajax())
        {
            $rpta = Actividad::where('act_estado',1)->where('idmeta','=', $idMeta)->orderBy('created_at','ASC')->get();
            return view('admin.meta.veractividad', array('rpta' => $rpta));
        }
        else
            return null;
    }
}
