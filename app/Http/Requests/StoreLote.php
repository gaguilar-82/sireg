<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLote extends FormRequest
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
            'ClaveLote' => 'required|max:15|min:6|unique:lotes,ClaveLote',
            'colonias_id' => 'required',
            'Macrolote' => 'max:4',
            'Etapa' => 'max:4',
            'Seccion' => 'max:4',
            'Poligono' => 'max:4',
            'Supermanzana' => 'max:4',
            'Manzana' => 'required|max:4',
            'NumLote' => 'required|max:4',
            'Casa' => 'max:4',
            'Superficie' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'Colindancia1' => 'required',
            'Colindancia2' => 'required',
            'Colindancia3' => 'required',
            'Colindancia4' => 'required',
            'Croquis' => 'nullable|image|dimensions:max_width=600,max_height=600|max:2048',
        ];
    }

    public function attributes()
    {
        return [
            'colonias_id' => 'Nombre de la Colonia',
            'NumLote' => 'Número de lote',
            'ClaveLote' => 'Clave Unica de Lote',
            'Colindancia1' => 'Colindancia 1',
            'Colindancia2' => 'Colindancia 2',
            'Colindancia3' => 'Colindancia 3',
            'Colindancia4' => 'Colindancia 4'
        ];
    }

    public function messages()
    {
        return [
            'Superficie.regex' => 'La superficie solo debe contener caractéres númericos.',
            'Latitud.regex' => 'La latitud solo debe contener caractéres númericos.', 
            'Longitud.regex' => 'La longitud solo debe contener caractéres númericos.'
        ];
    }
}
