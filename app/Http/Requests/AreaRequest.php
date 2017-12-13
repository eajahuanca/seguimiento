<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AreaRequest extends Request
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
        $ar = $this->route('area');
        return [
            'ar_nombre' => 'required|min:1|unique:areas,ar_nombre,'.$ar.',id',
            'ar_estado' => 'required',
        ];
    }

    public function attributes(){
        return [
            'ar_nombre' => 'Nombre de Area',
            'ar_estado' => 'Estado',
        ];
    }
}
