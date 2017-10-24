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
        return [
            'sol_codigo' => 'required',
            'sol_hrsigec' => 'required',
            'sol_tipo' => 'required',
            'sol_nombre' => 'required',
            'sol_objetivo' => 'required',
            'sol_justicacion' => 'required',
            'identidad' => 'required',
            'sol_sigla' => 'required',
            'iddepto' => 'required',
            'idprovincia' => 'required',
            'sol_municipio' => 'required',
            'idresponsable' => 'required',
            'sol_montofona' => 'required',
            'sol_montosol' => 'required',
            'sol_montootro' => 'required',
            'sol_tiempo' => 'required',
            //'sol_respaldo' => 'required',
            //'sol_ftecnica' => 'required',
            'idreglamento' => 'required',
            'sol_componente' => 'required',
        ];
    }
}






























