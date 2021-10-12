<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FincaCreateReques extends FormRequest
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
            'codigo' => ['required','unique:fincas,codigo'],
            'nombre' => ['required','min:5','unique:fincas,nombre'],
            'administracion' => ['required','min:5'],
        ];
    }
}
