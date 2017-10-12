<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sigec;

class SigecController extends Controller
{
    public function index(){
        try{
            $fechaInicial = '2017-03-01';
            $fechaFinal = '2017-08-01';
            $sigec = Sigec::orderBy('fecha_creacion','DESC')->whereBetween('fecha_creacion',[$fechaInicial, $fechaFinal])->get();
            return view('admin.sigec.index')->with('sigec', $sigec);
        }catch(\Exception $ex){
            dd($ex->getMessage());
        }
    }
}
