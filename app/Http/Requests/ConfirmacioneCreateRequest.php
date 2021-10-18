<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmacioneCreateRequest extends FormRequest
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
            'idprogramado' => ['required','unique:confirmaciones,idprogramado'],
            'latitud' => ['required','numeric'],
            'longitud' => ['required','numeric'],
            'abastecida' => ['required'],
            'descripcion' => ['required','min:10'],
        ];
    }
}
