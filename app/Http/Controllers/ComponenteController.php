<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ComponenteRequest;
use App\Componente;
use Carbon\Carbon;
use Session;

class ComponenteController extends Controller
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
        $componente = Componente::orderBy('created_at','DESC')->get();
        return view('admin.componente.index')
            ->with('componente', $componente);
    }

    public function create()
    {
        try{
            return view('admin.componente.create');
        }
        catch(\Exception $ex){
            return redirect()->route('componente.index');
        }
    }

    public function store(ComponenteRequest $request)
    {
        try{
            $componente = new Componente($request->all());
            $componente->save();
            $this->estado = "1";
            $this->title = 'Registro de componente';
            $this->msg = 'Los datos del componente '.$componente->com_nombre.' se registraron de manera satisfactoria';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('componente.index');
    }

    public function edit($id)
    {
        $componente = Componente::find($id);
        return view('admin.componente.edit')
            ->with('componente', $componente);
    }

    public function update(ComponenteRequest $request, $id)
    {
        try{
            $componente = Componente::find($id);
            $componente->fill($request->all());
            $componente->update();
            $this->estado = "1";
            $this->title = 'Actualización de componente';
            $this->msg = 'Se realizo la actualización de manera satisfactoria.';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Actualización';
            $this->msg = 'Ocurrio el siguiente error: '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('componente.index');
    }
}
