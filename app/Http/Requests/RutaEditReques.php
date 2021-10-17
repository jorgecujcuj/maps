<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RutaEditReques extends FormRequest
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
            'codigo' => ['required','unique:rutas,codigo,' . request()->route('ruta')->id],
            'nombre' => ['required','min:10','unique:rutas,nombre,' . request()->route('ruta')->id],
            'latitud' => ['required','numeric'],
            'longitud' => ['required','numeric'],
        ];
    }
}
