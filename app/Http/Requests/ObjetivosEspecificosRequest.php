<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ObjetivosEspecificosRequest extends Request
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
            'esp_objetivo' => 'required|min:1',
            //'esp_meta' => 'required|min:100',
            //'esp_resultado' => 'required|min:100'
            'esp_componente' => 'required|min:1'
        ];
    }

    public function attributes(){
        return [
            'esp_objetivo' => 'Objetivo Específico',
            //'esp_meta' => 'Meta',
            'esp_componete' => 'Componente'
        ];
    }
}
