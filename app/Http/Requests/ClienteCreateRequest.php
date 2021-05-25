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
          'run' => 'required|regex:/^\d{7,8}[0-9K]{1}$/',
          'nombre' => 'required|min:2|max:60',
          'apellido' => 'required|min:2|max:60',
          'password' => 'required|min:4|max:10',
          'correo' => 'required|min:4|max:60|email|unique:s_usuario,correo',
          'telefono' => 'required|min:4|max:9',
          'sexo' => 'required|min:1|max:2'
          // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
