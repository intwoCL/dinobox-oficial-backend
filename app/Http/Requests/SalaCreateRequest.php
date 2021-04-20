<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaCreateRequest extends FormRequest
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
            'nombre_sala'=>'required|min:2|max:50',
            'comentario'=>'max:100',
            'password'=>'max:10',
            'publico'=>'required|numeric|between:0,1',
        ];
    }
}
