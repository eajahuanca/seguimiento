<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\EjecutorProgramacion;
use App\Actividad;
use App\Solicitud;
use App\OEspecifico;
use Carbon\Carbon;
use DB;
use Session;

class EjecutorProgramacionForm1Controller extends Controller
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

    public function programacion($idactividad, $idsolicitud){
        $idactividad = decrypt($idactividad);
        $idsolicitud = decrypt($idsolicitud);
        $actividad = Actividad::find($idactividad);
        $solicitud = Solicitud::find($idsolicitud);
        return view('ejecutor.programacion.formulario.formuno.index')->with('actividad', $actividad)->with('solicitud', $solicitud);
    }

    public function guardarProgramacion(Request $request){
        $idsolicitud = decrypt($request->idsolicitud);
        $idactividad = decrypt($request->idactividad);
        try{
            $ejecutor = new EjecutorProgramacion($request->all());
            $ejecutor->idsolicitud = $idsolicitud;
            $ejecutor->idactividad = $idactividad;
            $ejecutor->form_formulario = 'FORMULARIO1';
            $ejecutor->form_gestion = date('Y');
            $ejecutor->iduregistra = Auth::user()->id;
            $ejecutor->iduactualiza = Auth::user()->id;
            $ejecutor->save();
            $this->estado = "1";
            $this->title = 'Registro de Programación';
            $this->msg = 'La actividad ha registrado una programación, de manera correcta';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        //return redirect()->route('ejecutor.show',encrypt($idsolicitud));
        return redirect()->action('EjecutorProgramacionForm1Controller@programacion',['idactividad' => encrypt($idactividad), 'idsolicitud' => encrypt($idsolicitud)]);
    }

    public function avance($idactividad, $idsolicitud, $form){
        $idsolicitud = decrypt($idsolicitud);
        $idactividad = decrypt($idactividad);
        $formulario = decrypt($form);
        try{
            $actividad = Actividad::find($idactividad);
            $solicitud = Solicitud::find($idsolicitud);
            $programado = EjecutorProgramacion::where('form_estado','=',1)
                ->where('idactividad','=',$idactividad)
                ->where('idsolicitud','=',$idsolicitud)
                ->where('form_formulario','=','FORMULARIO1')
                ->where('form_avance','=','0.00')
                ->orderBy('created_at','ASC')
                ->get();
            return view('ejecutor.programacion.formulario.formuno.avance')
                ->with('actividad', $actividad)
                ->with('solicitud', $solicitud)
                ->with('formulario', $form)
                ->with('programado', $programado);
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
            Session::put('estado', $this->estado);
            Session::put('title', $this->title);
            Session::put('msg', $this->msg);
            return redirect()->route('ejecutor.show',encrypt($idsolicitud));
        }
    }

    public function guardarAvance(Request $request){
        
        $position = $request->position - 1;
        $idsolicitud = decrypt($request->idsolicitud);
        $idactividad = decrypt($request->idactividad);
        $formulario = decrypt(decrypt($request->form_formulario));
        try{
            
            for($contador = 1; $contador <= $position; $contador++){
                $programado = EjecutorProgramacion::find($request->input('id'.$contador));
                $update = DB::table('ejecutorprogramaciones')
                    ->where('form_estado','=',1)
                    ->where('id','=',$request->input('id'.$contador))
                    ->where('idsolicitud','=',$idsolicitud)
                    ->where('idactividad','=',$idactividad)
                    ->where('form_formulario','=','FORMULARIO1')
                    ->where('form_mes','=',$request->form_mes)
                    ->update(
                        [
                            'form_avance' => $request->input('form_avance'.$contador),
                            'form_pavance' => ($request->input('form_avance'.$contador)*100)/($programado->form_programado),
                            'form_obs' => $request->input('form_obs'.$contador),
                            'iduactualiza' => Auth::user()->id,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
            }

            $this->estado = "1";
            $this->title = 'Registro de Avance';
            $this->msg = 'La actividad ha registrado su avance, de manera correcta';
        }catch(\Exception $ex){
            $this->estado = "2";
            $this->title = 'Error en Registro';
            $this->msg = 'Ocurrio el siguiente error : '.$ex->getMessage();
        }
        Session::put('estado', $this->estado);
        Session::put('title', $this->title);
        Session::put('msg', $this->msg);
        return redirect()->route('ejecutor.show',encrypt($idsolicitud));
    }

    public function reportOne(Request $request,$idsolicitud){
        $mes = EjecutorProgramacion::select('form_mes')
            ->where('form_formulario','=','FORMULARIO1')
            ->where('idsolicitud','=',$idsolicitud)
            ->orderBy('created_at','DESC')
            ->distinct('form_mes')
            ->first();
        $actividad = EjecutorProgramacion::where('form_formulario','=','FORMULARIO1')
            ->where('idsolicitud','=',$idsolicitud)
            ->where('form_mes','=',$mes->form_mes)
            ->orderBy('created_at','ASC')
            ->get();
        $componente = OEspecifico::where('idsolicitud','=',$idsolicitud)->first();
        $fechaImpresion = 'La Paz, '.date('d').' de '.$this->fecha().' de '.date('Y');
        $view = \View::make('ejecutor.programacion.formulario.formuno.reporte', compact('fechaImpresion','componente','actividad','mes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('LETTER','portrait');
        $pdf->loadHTML($view);
        return $pdf->download('FormOne'.date('dmY').date('His').'.pdf');
    }

    public function fecha()
    {
        $arrayMes = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        return $arrayMes[(int)(date('m')) - 1];
    }
}
