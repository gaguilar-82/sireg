<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePosesionario extends FormRequest
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
            'NombrePosesionario' => 'required',
            'ApellidoPaterno' => 'required',
            'ApellidoMaterno' => 'required',
            'CURP' => 'required|max:18|min:18|unique:posesionarios,CURP',
            'LugarNacimiento' => 'required',
            'FechaNacimiento' => 'required',
            'EstadoCivil' => 'required',
            'Ocupacion' => 'required',
            'Telefono' => 'required|max:10|min:10',
            'ActaNacimiento' => 'nullable|mimes:pdf|max:2048',
            'ActaMatrimonio' => 'nullable|mimes:pdf|max:2048',
            'ActaHijos' => 'nullable|mimes:pdf|max:2048',
            'IdentificacionOficial' => 'nullable|mimes:pdf|max:2048',
            'ComprobanteDomicilio' => 'nullable|mimes:pdf|max:2048',
            'ConstanciaNoPropiedad' => 'nullable|mimes:pdf|max:2048',
            'ConstanciaSolteria' => 'nullable|mimes:pdf|max:2048',
            'PoderNotarial' => 'nullable|mimes:pdf|max:2048'
       ];
    }

    public function attributes()
    {
        return [
            'NombrePosesionario' => 'Nombre',
            'ApellidoPaterno' => 'Apellido paterno',
            'ApellidoMaterno' => 'Apellido materno',
            'LugarNacimiento' => 'Lugar de nacimiento',
            'FechaNacimiento' => 'Fecha de nacimiento',
            'EstadoCivil' => 'Estado civil',
            'Telefono' => 'Teléfono'
        ];
    }

    /* public function messages()
    {
        return [
            'Superficie.regex' => 'La superficie solo debe contener caractéres númericos.',
            'Latitud.regex' => 'La latitud solo debe contener caractéres númericos.', 
            'Longitud.regex' => 'La longitud solo debe contener caractéres númericos.'
        ];
    } */
}
