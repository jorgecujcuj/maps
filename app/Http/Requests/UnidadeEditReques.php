<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnidadeEditReques extends FormRequest
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
            'codigo' => ['required','unique:unidades,codigo,' . request()->route('unidade')->id],
            'placa' => ['required','min:7','unique:unidades,placa,' . request()->route('unidade')->id],
            'capacidad' => ['required','min:5'],
        ];
    }
}
