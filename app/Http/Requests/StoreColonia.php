<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreColonia extends FormRequest
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
            'NombreColonia' => 'required',
            'TipoColonia' => 'required',
            'municipios_id' => 'required',
            'ClaveColonia' => 'required|max:9|min:7|unique:colonias,ClaveColonia',
            'ValorMetroCuadrado' => 'required|regex:/^\d*(\.\d{1,2})?$/'
        ];

    }

    public function attributes()
    {
        return [
            'NombreColonia' => 'Nombre de la Colonia',
            'TipoColonia' => 'Tipo de Colonia',
            'municipios_id' => 'Municipio de la Colonia',
            'ClaveColonia' => 'Clave de la Colonia',
            'ValorMetroCuadrado' => 'Valor por metro cuadrado'
        ];
    }

    public function messages()
    {
        return [
            'ValorMetroCuadrado.regex' => 'El valor por metro cuadrado debe contener valores numéricos.' 
        ];
    }
}
