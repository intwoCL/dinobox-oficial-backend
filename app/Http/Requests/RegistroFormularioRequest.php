<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroFormularioRequest extends FormRequest
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
            'nombre_solicitante' => 'required|min:2|max:50',
            'correo_solicitante' => 'required|min:4|max:100|email|',
            'motivo' =>'required|exists:re_formulario_motivo,id_formulario_motivo',
            'comentario_entrada' => 'required|min:4|max:50',
        ];
    }
}
