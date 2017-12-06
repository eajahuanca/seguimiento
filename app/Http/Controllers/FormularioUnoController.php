<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Solicitud;
use App\OEspecifico;
use App\Meta;
use App\Acciones;
use Carbon\Carbon;
use Session;

class FormularioUnoController extends Controller
{        
    private $title;
    private $msg;
    private $estado;

    public function __construct(){
        Carbon::setLocale('es');
        $this->estado = "";
        $this->title = "";
        $this->msg = "";
    }

    public function index()
    {       
        $userId = Auth::user()->id;
        $solicitud = Solicitud::where('idcontacto','=',$userId)->where('sol_estado','=','PRIMER DESEMBOLSO APROBADO')->get();
        return view('ejecutor.formulariouno.index')->with('solicitud', $solicitud);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function reporte(){
        $fechaImpresion = 'La Paz, '.date('d').' de '.$this->fecha().' de '.date('Y');
        $view = \View::make('ejecutor.formulariouno.reporte', compact('fechaImpresion'))->render();
        $pdf = \App::make('dompdf.wrapper');
        //$pdf->setPaper('legal','portrait'); vertical
        //$pdf->setPaper('LEGAL','landscape');
        $pdf->setPaper('LETTER','portrait');
        $pdf->loadHTML($view);
        return $pdf->download('FormularioUno'.date('d-m-Y').date('H-i-s').'.pdf');
    }

    public function fecha()
    {
        $arrayMes = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        return $arrayMes[(int)(date('m')) - 1];
    }   
}
