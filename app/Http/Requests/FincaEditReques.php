<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FincaEditReques extends FormRequest
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
        //$finca = $this->route('finca');
        return [
            //
            'codigo' => ['required','unique:fincas,codigo,' . request()->route('finca')->id],
            'nombre' => ['required','min:5','unique:fincas,nombre,' . request()->route('finca')->id],
            'administracion' => ['required','min:5'],
            'idruta' => ['required'],
        ];
    }
}
