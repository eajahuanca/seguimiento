<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EntidadRequest;
use App\Entidad;
use Carbon\Carbon;
use Session;

class EntidadController extends Controller
{
    private $title;
    private $msg;
    private $estado;

    public function __construct(){
        Carbon::setlocale('es');
        $this->estado = "";
        $this->title = "";
        $this->msg = "";
    }
    public function index()
    {
        $entidad = Entidad::orderBy('created_at','DESC')->get();
        return view('admin.entidad.index')
            ->with('entidad', $entidad);
    }

    public function getSiglas(Request $request, $entidadID)
    {
        if($request->ajax())
        {
            $rpta = Entidad::where('ent_estado',1)->where('id','=',$entidadID)->select('id','ent_sigla')->get();
            return response()->json($rpta);
        }
    }

    public function create()
    {
        try{
            return view('admin.entidad.create');
        }
        catch(\Exception $ex){
            return redirect()->route('entidad.index');
        }
    }

    public function store(EntidadRequest $request)
    {
        try{
            $entidad = new Entidad($request->all());
            $entidad->save();
            $this->estado = "1";
            $this->title = 'Registro de Entidad';
            $this->msg = 'Los datos de la Entidad '.$entidad->ent_nombre.' se registraron de manera satisfactoria';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('entidad.index');
    }

    public function edit($id)
    {
        $entidad = Entidad::find($id);
        return view('admin.entidad.edit')
            ->with('entidad', $entidad);
    }

    public function update(EntidadRequest $request, $id)
    {
        try{
            $entidad = Entidad::find($id);
            $entidad->fill($request->all());
            $entidad->update();
            $this->estado = "1";
            $this->title = 'Actualización de Entidad';
            $this->msg = 'Se realizo la actualización de manera satisfactoria.';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Actualización';
            $this->msg = 'Ocurrio el siguiente error: '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('entidad.index');
    }
}
