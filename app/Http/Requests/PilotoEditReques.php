<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PilotoEditReques extends FormRequest
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
            'codigo' => ['required','unique:pilotos,codigo,' . request()->route('piloto')->id],
            'nombre' => ['required','min:10','regex:/^[\pL\s\-]+$/u','unique:pilotos,nombre,' . request()->route('piloto')->id],
            'idunidad' => 'required',
        ];
    }
}
