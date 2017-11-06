<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MunicipioRequest extends Request
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
            'idprovincia' => 'required',
            'mun_nombre' => 'required|min:5',
            'mun_estado' => 'required',
        ];
    }

    public function attributes(){
        return [
            'idprovincia' => 'Provincia',
            'mun_nombre' => 'Nombre de Municipio',
            'mun_estado' => 'Estado',
        ];
    }
}
