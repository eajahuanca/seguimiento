<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EntidadRequest extends Request
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
            'param_entidad' => ['required'],
            'param_sigla' => ['required'],
            'param_unidad' => ['required'],
            'param_depto' => ['required'],
            'param_ciudad' => ['required'],
            'param_provincia' => ['required'],
            'param_municipio' => ['required'],
            'param_estado' => ['required']
        ];
    }
}
