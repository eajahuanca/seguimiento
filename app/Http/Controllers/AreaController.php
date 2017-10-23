<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AreaRequest;
use App\Area;
use Carbon\Carbon;
use Session;

class AreaController extends Controller
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
        $area = Area::orderBy('created_at','DESC')->get();
        return view('admin.area.index')
            ->with('area', $area);
    }

    public function create()
    {
        try{
            return view('admin.area.create');
        }
        catch(\Exception $ex){
            return redirect()->route('area.index');
        }
    }

    public function store(AreaRequest $request)
    {
        try{
            $area = new Area($request->all());
            $area->save();
            $this->estado = "1";
            $this->title = 'Registro de area';
            $this->msg = 'Los datos del area '.$area->ar_nombre.' se registraron de manera satisfactoria';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('area.index');
    }

    public function edit($id)
    {
        $area = Area::find($id);
        return view('admin.area.edit')
            ->with('area', $area);
    }

    public function update(AreaRequest $request, $id)
    {
        try{
            $area = Area::find($id);
            $area->fill($request->all());
            $area->update();
            $this->estado = "1";
            $this->title = 'Actualización de area';
            $this->msg = 'Se realizo la actualización de manera satisfactoria.';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Actualización';
            $this->msg = 'Ocurrio el siguiente error: '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('area.index');
    }
}
