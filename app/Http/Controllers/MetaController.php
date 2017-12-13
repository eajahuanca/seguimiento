<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;

use App\Http\Requests;
use App\Solicitud;
use App\OEspecifico;
use App\Meta;
use Carbon\Carbon;
use Session;

class MetaController extends Controller
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
            $meta = Meta::orderBy('created_at','ASC')->where('idobjetivo','=',$objetivo->id)->get();
            return view('admin.meta.create')->with('objetivo',$objetivo)->with('meta',$meta);
        }catch(\Exception $ex){
            flash('error', "Ocurrió el siguiente error: ".$ex->getMessage());
            return Redirect::previous();
        }
    }

    public function store(Request $request){
        $idobjetivo = decrypt($request->idobjetivo);
        $objetivo = OEspecifico::find($idobjetivo);

        try{
            $meta = new Meta($request->all());
            $meta->idobjetivo = decrypt($request->idobjetivo);
            $meta->iduregistra = Auth::user()->id;
            $meta->iduactualiza = Auth::user()->id;
            $meta->save();
            $this->estado = "1";
            $this->title = "Registro de la Meta";
            $this->msg = "Los datos de la Meta, se registraron de manera correcta";
            
            return redirect()->route('meta.edit',encrypt($objetivo->id));
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = "Error en registro";
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('meta.edit', encrypt($objetivo->id));
    }

    public function getMeta(Request $request, $idObjetivo){
        if($request->ajax())
        {
            $rpta = Meta::where('met_estado',1)->where('idobjetivo','=', $idObjetivo)->orderBy('created_at','ASC')->get();
            return view('admin.objetivo.vermeta', array('rpta' => $rpta));
        }
        else
            return null;
    }
}