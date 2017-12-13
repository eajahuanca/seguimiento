<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CargoRequest extends Request
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
        $car = $this->route('cargo');
        return [
            'car_nombre' => 'required|min:1|unique:cargos,car_nombre,'.$car.',id',
            'car_estado' => 'required',
        ];
    }

    public function attributes(){
        return [
            'car_nombre' => 'Nombre del cargo',
            'car_estado' => 'Estado',
        ];
    }
}
