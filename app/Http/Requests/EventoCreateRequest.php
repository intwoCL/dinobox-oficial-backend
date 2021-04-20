<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoCreateRequest extends FormRequest
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
            'fecha' => 'required|date_format:d-m-Y',
            'hora' =>  'required|regex:/(\d+:\d+)/', //'required|date_format:H:i'
            'nombre' => 'required|min:4|max:50',
            'descripcion' => 'required|min:4|max:50',
            'encargado' => 'nullable|max:50',
            'lugar' => 'nullable|max:50',
            'selectVisible' => 'required|numeric|between:1,2',
        ];
    }
}
