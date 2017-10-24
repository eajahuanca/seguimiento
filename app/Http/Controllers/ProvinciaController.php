<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProvinciaRequest;
use App\Provincia;
use App\Departamento;
use Carbon\Carbon;
use Session;

class ProvinciaController extends Controller
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
        $provincia = Provincia::orderBy('created_at','DESC')->get();
        return view('admin.provincia.index')
            ->with('provincia', $provincia);
    }

    public function getProvincias(Request $request)
    {
        if($request->ajax())
        {
            $rpta = Provincia::select('id','pro_nombre')->where('pro_estado',1)->where('iddepto','=', $request->departamentoID)->orderBy('pro_nombre','ASC')->get();
            return response()->json($rpta);
        }
    }

    public function create()
    {
        try{
            $departamento = Departamento::lists('dep_descripcion','id');
            return view('admin.provincia.create')
                ->with('departamento', $departamento);
        }
        catch(\Exception $ex){
            return redirect()->route('provincia.index');
        }
    }

    public function store(ProvinciaRequest $request)
    {
        try{
            $provincia = new Provincia($request->all());
            $provincia->save();
            $this->estado = "1";
            $this->title = 'Registro de provincia';
            $this->msg = 'Los datos de la provincia '.$provincia->pro_nombre.' se registraron de manera satisfactoria';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('provincia.index');
    }

    public function edit($id)
    {
        $departamento = Departamento::lists('dep_descripcion','id')->where('dep_estado','=','1');
        $provincia = Provincia::find($id);
        return view('admin.provincia.edit')
            ->with('provincia', $provincia)
            ->with('departamento', $departamento);
    }

    public function update(ProvinciaRequest $request, $id)
    {
        try{
            $provincia = Provincia::find($id);
            $provincia->fill($request->all());
            $provincia->update();
            $this->estado = "1";
            $this->title = 'Actualización de provincia';
            $this->msg = 'Se realizo la actualización de manera satisfactoria.';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Actualización';
            $this->msg = 'Ocurrio el siguiente error: '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('provincia.index');
    }
}
