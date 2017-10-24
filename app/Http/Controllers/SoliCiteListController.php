<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Cite;
use App\Solicitud;
use Carbon\Carbon;
use Session;

class SoliCiteListController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        $solicitud = Solicitud::orderBy('created_at','DESC')->get();
        return view('admin.solicitud.index')
                ->with('solicitud', $solicitud);
    }

    public function store(Request $request){
        try{
            $cite = Cite::where('cit_descripcion','=',Auth::user()->us_depto)->get();
            $nuevoCite = $cite[0]['cit_correlativo'] + 1;
            $updateCite = Cite::find($cite[0]['id']);
            $updateCite->cit_correlativo = $nuevoCite;
            $updateCite->update();
            Session::put('cite',$cite[0]['cit_sigla'].''.$this->correlativo($nuevoCite));
            flash('Se ha Generado el Cite : <b>'.Session::get('cite').'</b> para la solicitud')->warning();
        }catch(\Exception $ex){
            flash('Ocurrió el siguiente error: '.$ex->getMessages())->error();
        }
        return redirect()->route('solicitud.index');
    }

    public function correlativo($valor){
        if($valor < 10){
            return '000'.$valor;
        }
        if($valor < 100){
            return '00'.$valor;
        }
        if($valor <1000){
            return '0'.$valor;
        }
        else{
            return ''.$valor;
        }
    }
}
