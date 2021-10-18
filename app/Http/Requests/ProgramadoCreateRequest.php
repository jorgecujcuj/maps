<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramadoCreateRequest extends FormRequest
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
            'idsolicitud' => ['required','unique:programados,idsolicitud'],
            'operador' => ['required','min:10','regex:/^[\pL\s\-]+$/u'],
            'estado' => ['required'],
            'idfinca' => 'required',
            'idunidad' => 'required',
            'salida' => 'required',
        ];
    }
}
