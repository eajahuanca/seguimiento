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
            'proy_codigo' => 'required',
            'proy_hrsigec' => 'required',
            'proy_tipo' => 'required',
            'proy_nombre' => 'required',
            'proy_objetivo' => 'required',
            'proy_justificacion' => 'required',
            'proy_entidad' => 'required',
            'proy_sigla' => 'required',
            'proy_unidad' => 'required',
            'proy_depto' => 'required',
            'proy_provincia' => 'required',
            'proy_municipio' => 'required',
            'id_responsable' => 'required',
            'proy_montofona' => 'required',
            'proy_montosol' => 'required',
            'proy_tiempo' => 'required',
            'proy_respaldo' => 'required',
            'proy_estado' => 'required'
        ];
    }
}






























