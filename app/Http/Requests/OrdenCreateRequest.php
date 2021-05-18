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
          'remitente_rut' => 'required|min:10|max:15',
          'remitente_nombre' => 'required|min:10|max:150',
          'remitente_direccion' => 'required|min:10|max:300',
          'remitente_numero' => 'required|min:1|max:30',
          'remitente_correo'=> 'required|min:5|max:150|email',
          'remitente_telefono' => 'required|min:4|max:9',
          'remitente_id_comuna' => 'required|exists:s_comuna,id',
          'destinatario_nombre' => 'required|min:10|max:150',
          'destinatario_direccion' => 'required|min:10|max:300',
          'destinatario_numero' => 'required|min:1|max:30',
          'destinatario_correo' => 'required|min:5|max:150|email',
          'destinatario_telefono' => 'required|min:4|max:10',
          'destinatario_id_comuna' => 'required|exists:s_comuna,id',
          'precio' => 'required|numeric|min:1|max:10'
        ];
    }
}
