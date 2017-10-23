<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MunicipioRequest;
use App\Provincia;
use App\Municipio;
use Carbon\Carbon;
use Session;

class MunicipioController extends Controller
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
        $municipio = Municipio::orderBy('created_at','DESC')->get();
        return view('admin.municipio.index')
            ->with('municipio', $municipio);
    }

    public function create()
    {
        try{
            $provincia = Provincia::lists('pro_nombre','id')->where('pro_estado','=','1');
            return view('admin.municipio.create')
                ->with('provincia', $provincia);
        }
        catch(\Exception $ex){
            return redirect()->route('municipio.index');
        }
    }

    public function store(MunicipioRequest $request)
    {
        try{
            $municipio = new Municipio($request->all());
            $municipio->save();
            $this->estado = "1";
            $this->title = 'Registro de municipio';
            $this->msg = 'Los datos del municipio '.$municipio->mun_nombre.' se registraron de manera satisfactoria';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('municipio.index');
    }

    public function edit($id)
    {
        $provincia = Provincia::lists('pro_nombre','id');
        $municipio = Municipio::find($id);
        return view('admin.municipio.edit')
            ->with('municipio', $municipio)
            ->with('provincia', $provincia);
    }

    public function update(MunicipioRequest $request, $id)
    {
        try{
            $municipio = Municipio::find($id);
            $municipio->fill($request->all());
            $municipio->update();
            $this->estado = "1";
            $this->title = 'Actualización de municipio';
            $this->msg = 'Se realizo la actualización de manera satisfactoria.';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Actualización';
            $this->msg = 'Ocurrio el siguiente error: '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('municipio.index');
    }
}
