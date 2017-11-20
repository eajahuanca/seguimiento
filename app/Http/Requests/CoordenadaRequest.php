<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CoordenadaRequest extends Request
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
            'coor_x_origin' => 'required|numeric',
            'coor_y_origin' => 'required|numeric'
        ];
    }

    public function attributes(){
        return [
            'coor_x_origin' => 'Coordenada X',
            'coor_y_origin' => 'Coordenada Y'
        ];
    }
}
