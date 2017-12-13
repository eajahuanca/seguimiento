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
        $ent = $this->route('entidad');
        return [
            'ent_nombre' => 'required|min:1|unique:entidades,ent_nombre,'.$ent.',id',
            'ent_sigla' => 'required|min:3',
            'ent_estado' => 'required',
        ];
    }

    public function attributes(){
        return [
            'ent_nombre' => 'Nombre de entidad',
            'ent_sigla' => 'Sigla',
            'ent_estado' => 'Estado',
        ];
    }
}
