<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SolicitudRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $solicitud = $this->route('solicitud');
        return [
            'sol_codigo' => 'required|unique:solicitudes,sol_codigo,'.$solicitud.',sol_codigo',
            'sol_hrsigec' => 'required',
            'sol_tipo' => 'required',
            'sol_nombre' => 'required|unique:solicitudes,sol_nombre,'.$solicitud.',sol_nombre',
            'sol_objetivo' => 'required|min:1',
            'sol_justicacion' => 'required|min:1',
            'identidad' => 'required|exists:entidades,id',
            'sol_sigla' => 'required|min:3',
            'iddepto' => 'required|exists:departamentos,id',
            'idprovincia' => 'required|exists:provincias,id',
            'sol_municipio' => 'required',
            'idresponsable' => 'required|exists:users,id',
            'sol_montofona' => ['required','regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'sol_montosol' => ['required','regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'sol_montootro' => ['required','regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'sol_tiempo' => ['required','regex:/^[1-9]+/'],
            'sol_respaldo' => 'required|mimes:pdf',
            'sol_ftecnica' => 'required|mimes:pdf',
            'idreglamento' => 'required|exists:reglamentos,id',
            //'sol_componente' => 'required',
        ];
    }

    public function attributes(){
        return [
            'sol_codigo' => 'Código',
            'sol_hrsigec' => 'Hoja de ruta',
            'sol_tipo' => 'Tipo de Solicitud',
            'sol_nombre' => 'Nombre del Proyecto',
            'sol_objetivo' => 'Objetivo',
            'sol_justicacion' => 'Justificación',
            'identidad' => 'Entidad (UE)',
            'sol_sigla' => 'Sigla',
            'iddepto' => 'Departamento',
            'idprovincia' => 'Provincia',
            'sol_municipio' => 'Municipio(s)',
            'idresponsable' => 'Responsable',
            'sol_montofona' => 'Monto Fonabosque',
            'sol_montosol' => 'Monto Contraparte',
            'sol_montootro' => 'Otro Monto',
            'sol_tiempo' => 'Tiempo',
            'idreglamento' => 'Reglamento',
            //'sol_componente' => 'Componente(s)',
            'sol_respaldo' => 'Archivo de Respaldo',
            'sol_ftecnica' => 'Ficha Técnica'
        ];
    }
}






























