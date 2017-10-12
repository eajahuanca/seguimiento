<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\EntidadRequest;
use App\Entidad;
use Carbon\Carbon;
use Session;

class EntidadController extends Controller
{
    public function __construct(){
        Carbon::setlocale('es');
    }
    public function index()
    {
        $entidad = Entidad::orderBy('created_at','DESC')->get();
        return view('admin.entidad.index')
            ->with('entidad', $entidad);
    }

    public function create()
    {
        try{
            $soloEntidad = Entidad::orderBy('param_entidad','DESC')->get();
            return view('admin.entidad.create')
                ->with('soloEntidad', $soloEntidad);
        }
        catch(\Exception $ex){
            return redirect()->route('entidad.index');
        }
    }

    public function store(EntidadRequest $request)
    {
        try{
            $entidad = new Entidad($request->all());
            $entidad->id_uregistra = Auth::user()->id;
            $entidad->id_uactualiza = Auth::user()->id;
            $entidad->save();
            Session::put('estado','1');
            Session::put('title','Registro Exitoso');
            Session::put('msg','Los datos de la Entidad '.$entidad->param_entidad.' se registraron de manera satisfactoria');
        }catch(\Exception $ex){
            Session::put('estado','2');
            Session::put('title','Error en registro');
            Session::put('msg','Error: '.$ex->getMessage());
        }
        return redirect()->route('entidad.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
}
