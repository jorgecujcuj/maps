<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudEditRequest extends FormRequest
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
            'telefono' => ['required','min:8','numeric','unique:solicitudes,telefono,' . request()->route('solicitude')->id],
            'observacion' => ['required','min:10'],
        ];
    }
}

