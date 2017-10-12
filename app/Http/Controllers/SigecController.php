<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sigec;

class SigecController extends Controller
{
    public function index(){
        try{
            $sigec = Sigec::orderBy('fecha_creacion','DESC')->where('fecha_creacion','>=',2017)->get();
            return view('admin.sigec.index')->with('sigec', $sigec);
        }catch(\Exception $ex){
            dd($ex->getMessage());
        }
    }
}
