<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StandCreateRequest extends FormRequest
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
            'cantidad' => 'required|numeric|between:1,6',
            'nombre' => 'required|min:2|max:100',
        ];
    }
}
