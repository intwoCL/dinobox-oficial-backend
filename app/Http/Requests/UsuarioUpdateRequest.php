<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioUpdateRequest extends FormRequest
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
          'nombre' => 'required|min:2|max:60',
          'apellido' => 'required|min:2|max:60',
          'username' => 'required|min:4|max:60|unique:s_usuario,username',
          'password' => 'required|min:4|max:8',
          'birthdate' => 'required|date_format:d-m-Y',
          'correo' => 'required|min:4|max:60|email|unique:s_usuario,correo',
          'rol' => 'required|numeric|between:1,3'
        ];
    }
}
