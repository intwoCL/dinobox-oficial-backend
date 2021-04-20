<?php

namespace App\Http\Requests\Tutoria;

use Illuminate\Foundation\Http\FormRequest;

class EspecialidadCodigoUpdateRequest extends FormRequest
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
          'codigo' => 'required|min:1|max:20|unique:th_especialidad,codigo',
        ];
    }
}
