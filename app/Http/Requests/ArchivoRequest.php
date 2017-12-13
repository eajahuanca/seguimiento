<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArchivoRequest extends Request
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
            'ar_archivo' => 'required|mimes:pdf',
            'ar_detalle' => 'required|min:2',
        ];
    }

    public function attributes(){
        return [
            'ar_archivo' => 'Archivo',
            'ar_detalle' => 'Descripción',
        ];
    }
}
