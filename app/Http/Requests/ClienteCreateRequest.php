<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteCreateRequest extends FormRequest
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
          'nombre' => 'required|min:2|max:100',
          'apellido' => 'required|min:2|max:100',
          'password' => 'required|min:4|max:100',
          'correo' => 'required|min:4|max:100|email|unique:s_usuario,correo',
          'telefono' => 'required|min:4|max:9',
        ];
    }
}
