<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;

use App\Http\Requests;
use App\Http\Requests\AccionesRequest;
use App\OEspecifico;
use App\Accion;
use Carbon\Carbon;
use Session;

class AccionesController extends Controller
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
            $objetivo = OEspecifico::find($id);
            return view('admin.accion.create')->with('objetivo',$objetivo);
        }catch(\Exception $ex){
            flash('error', "Ocurrió el siguiente error: ".$ex->getMessage());
            return Redirect::back();
        }
    }

    public function store(AccionesRequest $request){
        try{
            $accion = new Accion($request->all());
            $fechaArray = explode(' - ',$request->acc_desde);
            $fechaDesde = explode('/',$fechaArray[0]);
            $fechaHasta = explode('/',$fechaArray[1]);
            $accion->acc_desde = $fechaDesde[2].'-'.$fechaDesde[0].'-'.$fechaDesde[1];
            $accion->acc_hasta = $fechaHasta[2].'-'.$fechaHasta[0].'-'.$fechaHasta[1];
            $accion->iduregistra = Auth::user()->id;
            $accion->iduactualiza = Auth::user()->id;
            $accion->save();
            $this->estado = "1";
            $this->title = "Registro de Acciones";
            $this->msg = "Los datos de la acción, se registraron de manera correcta";
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = "Error en registro";
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('objetivo.edit',encrypt($request->idsolicitud));
    }
}
