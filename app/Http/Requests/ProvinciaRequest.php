<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProvinciaRequest extends Request
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
            'iddepto' => 'required',
            'pro_nombre' => 'required|min:5',
            'pro_estado' => 'required',
        ];
    }

    public function attributes(){
        return [
            'iddepto' => 'Departamento',
            'pro_nombre' => 'Nombre de la provincia',
            'pro_estado' => 'Estado',
        ];
    }
}
