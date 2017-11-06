<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ComponenteRequest extends Request
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
        $com = $this->route('componente');
        return [
            'com_nombre' => 'required|min:5|unique:componentes,com_nombre,'.$com.',id',
            'com_descripcion' => 'required',
            'com_estado' => 'required',
        ];
    }

    public function attributes(){
        return [
            'com_nombre' => 'Nombre del Componente',
            'com_descripcion' => 'Descripción',
            'com_estado' => 'Estado',
        ];
    }
}
