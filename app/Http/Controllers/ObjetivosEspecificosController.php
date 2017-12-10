<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;

use App\Http\Requests;
use App\Http\Requests\ObjetivosEspecificosRequest;
use App\Solicitud;
use App\OEspecifico;
use Carbon\Carbon;
use Session;

class ObjetivosEspecificosController extends Controller
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
            $solicitud = Solicitud::find($id);
            $objetivo = OEspecifico::orderBy('created_at','ASC')->where('idsolicitud','=',$solicitud->id)->get();
            return view('admin.objetivo.create')->with('solicitud',$solicitud)->with('objetivo',$objetivo);
        }catch(\Exception $ex){
            flash('error', "Ocurrió el siguiente error: ".$ex->getMessage());
            return Redirect::back();
        }
    }

    public function store(ObjetivosEspecificosRequest $request){
        try{
            $objetivo = new OEspecifico($request->all());
            $objetivo->idsolicitud = decrypt($request->idsolicitud);
            $objetivo->esp_seguimiento = 'SIN INICIAR';
            $objetivo->iduregistra = Auth::user()->id;
            $objetivo->iduactualiza = Auth::user()->id;
            $objetivo->save();
            $solicitud = Solicitud::find($objetivo->idsolicitud);
            $this->estado = "1";
            $this->title = "Registro de Objetivo";
            $this->msg = "Los datos del Objetivo Escpecifico, se registraron de manera correcta";
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = "Error en registro";
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('objetivo.edit',encrypt($solicitud->id));
    }
}
