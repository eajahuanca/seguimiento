<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Solicitud;
use App\Entidad;
use App\User;
use App\Sigec;
use Carbon\Carbon;
use DB;
use Session;

class SolicitudController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index()
    {
        $sigec = Sigec::select('nur','nombre_remitente','codigo','fecha_creacion')->where('nur','like','20%')->get();
        $responsable = User::select(
                       DB::raw('CONCAT(us_paterno," ",us_materno," ",us_nombre) as responsable'), 'id')
                       ->where('us_estado', 1)
                       ->orderBy('responsable','ASC')
                       ->lists('responsable','id');
        $entidad = Entidad::where('ent_estado', 1)->orderBy('ent_nombre','ASC')->lists('ent_nombre','ent_nombre');
        return view('admin.solicitud.index')
            ->with('responsable',$responsable)
            ->with('sigec', $sigec)
            ->with('entidad', $entidad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
