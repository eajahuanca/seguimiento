<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CargoRequest;
use App\Cargo;
use Carbon\Carbon;
use Session;

class CargoController extends Controller
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
        $cargo = Cargo::orderBy('created_at','DESC')->get();
        return view('admin.cargo.index')
            ->with('cargo', $cargo);
    }

    public function create()
    {
        try{
            return view('admin.cargo.create');
        }
        catch(\Exception $ex){
            return redirect()->route('cargo.index');
        }
    }

    public function store(CargoRequest $request)
    {
        try{
            $cargo = new Cargo($request->all());
            $cargo->save();
            $this->estado = "1";
            $this->title = 'Registro de cargo';
            $this->msg = 'Los datos del cargo '.$cargo->car_nombre.' se registraron de manera satisfactoria';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('cargo.index');
    }

    public function edit($id)
    {
        $cargo = Cargo::find($id);
        return view('admin.cargo.edit')
            ->with('cargo', $cargo);
    }

    public function update(CargoRequest $request, $id)
    {
        try{
            $cargo = Cargo::find($id);
            $cargo->fill($request->all());
            $cargo->update();
            $this->estado = "1";
            $this->title = 'Actualización de cargo';
            $this->msg = 'Se realizo la actualización de manera satisfactoria.';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Actualización';
            $this->msg = 'Ocurrio el siguiente error: '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('cargo.index');
    }
}
