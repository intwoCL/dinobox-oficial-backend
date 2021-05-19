<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordClienteRequest extends FormRequest
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
          'password_actual' => 'required|min:4|max:10',
          'password_nueva' => 'required|min:4|max:10|different:password_actual',
          'password_nueva_repetir' => 'required|min:4|max:10|same:password_nueva',
        ];
    }
}
