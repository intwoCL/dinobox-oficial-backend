<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StandLoginRequest extends FormRequest
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
            'codigo' => 'required|exists:ev_stand,codigo_stand|regex:/([A-Z]{4})-([0-9]{2})/', 
        ];
    }
}
