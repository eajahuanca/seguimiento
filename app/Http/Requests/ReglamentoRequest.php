<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReglamentoRequest extends Request
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
        $reg = $this->route('reglamento');
        return [
            'reg_nombre' => 'required|min:10|unique:reglamentos,reg_nombre,'.$reg.',reg_nombre',
            'reg_descripcion' => 'required|min:20',
            'reg_archivo' => 'required|mimes:pdf',
        ];
    }

    public function attributes(){
        return [
            'reg_nombre' => 'Nombre del reglamento',
            'reg_descripcion' => 'Descripcion',
            'reg_archivo' => 'Archivo',
        ];
    }
}
