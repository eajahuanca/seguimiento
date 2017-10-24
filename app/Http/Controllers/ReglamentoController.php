<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ReglamentoRequest;
use App\Reglamento;
use Carbon\Carbon;
use Session;

class ReglamentoController extends Controller
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
        $reglamento = Reglamento::orderBy('created_at','DESC')->get();
        return view('admin.reglamento.index')
            ->with('reglamento', $reglamento);
    }

    public function create()
    {
        try{
            return view('admin.reglamento.create');
        }
        catch(\Exception $ex){
            return redirect()->route('reglamento.index');
        }
    }

    public function store(ReglamentoRequest $request)
    {
        try{
            $reglamento = new Reglamento($request->all());
            $reglamento->save();
            $this->estado = "1";
            $this->title = 'Registro de reglamento';
            $this->msg = 'Los datos del reglamento '.$reglamento->reg_nombre.' se registraron de manera satisfactoria';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('reglamento.index');
    }

    public function edit($id)
    {
        $reglamento = Reglamento::find($id);
        return view('admin.reglamento.edit')
            ->with('reglamento', $reglamento);
    }

    public function update(ReglamentoRequest $request, $id)
    {
        try{
            $reglamento = Reglamento::find($id);
            $reglamento->fill($request->all());
            $reglamento->update();
            $this->estado = "1";
            $this->title = 'Actualización de reglamento';
            $this->msg = 'Se realizo la actualización de manera satisfactoria.';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Actualización';
            $this->msg = 'Ocurrio el siguiente error: '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('reglamento.index');
    }
}
