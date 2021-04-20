<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoCreateRequest extends FormRequest
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
          'id_alumno' => 'required|exists:s_alumno,id',
          'codigo_votacion' => 'required|exists:vo_votacion,codigo',
          'mensaje' => 'max:300',
          'grupo' => 'required|exists:vo_grupo,id',
        ];
    }
}
