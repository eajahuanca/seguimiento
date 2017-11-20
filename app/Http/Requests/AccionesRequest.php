<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AccionesRequest extends Request
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
            'acc_descripcion' => 'required|min:150',
            'acc_desde' => 'required'
        ];
    }

    public function attributes(){
        return [
            'acc_descripcion' => 'Descripción de la acción',
            'acc_desde' => 'Rango de fechas'
        ];
    }
}
