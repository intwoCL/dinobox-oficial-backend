<?php

namespace App\Http\Requests\Tutoria;

use Illuminate\Foundation\Http\FormRequest;

class EspecialidadConfigUpdateRequest extends FormRequest
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
          'buscar_usuario' => 'required|in:1,2',
          'registrar_visita' => 'required|in:1,2',
        ];
    }
}
