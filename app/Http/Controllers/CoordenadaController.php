<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;

use App\Http\Requests;
use App\Http\Requests\CoordenadaRequest;
use App\OEspecifico;
use App\Coordenada;
use Carbon\Carbon;
use Session;

class CoordenadaController extends Controller
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
            return view('admin.coordenada.create')->with('objetivo',$objetivo);
        }catch(\Exception $ex){
            flash('error', "Ocurrió el siguiente error: ".$ex->getMessage());
            return Redirect::back();
        }
    }

    public function store(CoordenadaRequest $request){
        try{
            $coordenada = new Coordenada($request->all());
            $coordenada->coor_x_map = '-16.'.$request->coor_x_origin;
            $coordenada->coor_y_map = '-68.'.$request->coor_y_origin;
            $coordenada->iduregistra = Auth::user()->id;
            $coordenada->iduactualiza = Auth::user()->id;
            $coordenada->save();
            $this->estado = "1";
            $this->title = "Registro de Coordenadas";
            $this->msg = "Los datos de la Coordenada, se registraron de manera correcta";
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

    public function getCoordenada(Request $request, $idObjetivo){
        if($request->ajax())
        {
            $rpta = Coordenada::select('coor_x_map','coor_y_map')->where('coor_estado',1)->where('idobjetivo','=', $idObjetivo)->orderBy('created_at','ASC')->get();
            return response()->json($rpta);
        }
        else
            return null;
    }
}
