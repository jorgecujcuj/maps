<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RutaCreateReques extends FormRequest
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
            //
            'codigo' => ['required','unique:rutas,codigo'],
            'nombre' => ['required','min:10','unique:rutas,nombre'],
            'latitud' => ['required','numeric'],
            'longitud' => ['required','numeric'],
        ];
    }
}
