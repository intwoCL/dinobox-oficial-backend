<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenCreateRequest extends FormRequest
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
          'remitente_nombre' => 'required|min:10|max:150',
          'remitente_direccion' => 'required|min:10|max:150',
          'remitente_email'=> 'required|min:10|max:150|email',
          'remitente_telefono' => 'required|min:4|max:9',
          'remitente_id_comuna' => 'required',
          'destinatario_nombre' => 'required|min:10|max:150',
          'destinatario_direccion' => 'required|min:10|max|150',
          'destinatario_email' => 'required|min:10|max:150|email',
          'destinatario_telefono' => 'required|min:4|max:10',
          'destinatario_id_comuna' => 'required',
          'precio' => 'required|min:4|max:10'
        ];
    }
}
