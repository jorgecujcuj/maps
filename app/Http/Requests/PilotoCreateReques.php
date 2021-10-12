<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PilotoCreateReques extends FormRequest
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
            'codigo' => ['required','unique:pilotos,codigo'],
            'nombre' => ['required','min:10','regex:/^[\pL\s\-]+$/u','unique:pilotos,nombre'],
            'idunidad' => 'required',
        ];
    }
}
