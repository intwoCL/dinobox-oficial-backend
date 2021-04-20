<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RunValidateRequest extends FormRequest
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
        ];
    }
}
