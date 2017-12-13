<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\EjecutorCronograma;
use App\Solicitud;
use Carbon\Carbon;
use Session;

class EjecutorCronogramaController extends Controller
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

    public function index(){
        try{
            $userId = Auth::user()->id;
            $solicitud = Solicitud::where('idcontacto','=',$userId)->where('sol_estado','=','PRIMER DESEMBOLSO APROBADO')->first();
            $ejecutor = EjecutorCronograma::where('idsolicitud','=',$solicitud->id)
                ->where('eje_estado','=',1)
                ->orderBy('created_at', 'DESC')
                ->get();
            return view('ejecutor.cronograma.index')
                ->with('ejecutor', $ejecutor)
                ->with('solicitud', $solicitud);
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('ejecutor.index');
    }

    public function store(Request $request){
        $idsolicitud = decrypt($request->idsolicitud);
        try{
            $ejecutor = new EjecutorCronograma($request->all());
            $ejecutor->idsolicitud = $idsolicitud;
            $ejecutor->iduregistra = Auth::user()->id;
            $ejecutor->iduactualiza = Auth::user()->id;
            $ejecutor->save();
            $this->estado = "1";
            $this->title = 'Registro de Cronograma';
            $this->msg = 'Los datos del cronograma correspondiente al mes de : '.$ejecutor->eje_corresponde.', se registraron de manera correcta';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('ecronograma.index');
    }

    public function reporteCronograma(){
        try{
            $userId = Auth::user()->id;
            $solicitud = Solicitud::where('idcontacto','=',$userId)->where('sol_estado','=','PRIMER DESEMBOLSO APROBADO')->first();
            $ejecutor = EjecutorCronograma::where('idsolicitud','=',$solicitud->id)
            ->where('eje_estado','=',1)
            ->orderBy('created_at', 'ASC')
            ->get();

            $fechaImpresion = 'La Paz, '.date('d').' de '.$this->fecha().' de '.date('Y');
            $view = \View::make('ejecutor.cronograma.reporte', compact('fechaImpresion','ejecutor','solicitud'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('LETTER','portrait');
            $pdf->loadHTML($view);
            return $pdf->download('Cronograma'.date('dmY').date('His').'.pdf');

        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        return redirect()->route('ecronograma.index');
    }

    public function fecha()
    {
        $arrayMes = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        return $arrayMes[(int)(date('m')) - 1];
    }
}
