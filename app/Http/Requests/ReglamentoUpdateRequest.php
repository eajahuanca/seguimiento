<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReglamentoUpdateRequest extends Request
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
            'reg_nombre' => 'required|min:1|unique:reglamentos,reg_nombre,'.$reg.',id',
            'reg_descripcion' => 'required|min:2',
            'reg_archivo' => 'mimes:pdf',
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
