<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthUsuarioPasswordRequest extends FormRequest
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
            'password_actual' => 'required|min:4|max:8',
            'password_nueva' => 'required|min:4|max:8|different:password_actual',
            'password_nueva_repetir' => 'required|min:4|max:8|same:password_nueva',
        ];
    }
}
