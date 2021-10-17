<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudCreateRequest extends FormRequest
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
            'idfinca' => ['required',],
            'idpiloto' => ['required'],
            'fechasolicitada' => ['required'],
            'telefono' => ['required','min:8','numeric','unique:solicitudes,telefono'],
            'observacion' => ['required','min:10'],
        ];
    }
}
