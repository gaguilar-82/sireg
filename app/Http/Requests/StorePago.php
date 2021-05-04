<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePago extends FormRequest
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
            'asignados_id' => 'required',
            'FolioPago' => 'required|unique:pagos,FolioPago',
            'FechaPago' => 'required',
            'conceptos_id' => 'required',
            'CantidadPago' => 'required' 
        ];

    }

    public function attributes()
    {
        return [
            'asignados_id' => 'Nombre del Posesionario',
            'FolioPago' => 'Folio del recibo',
            'FechaPago' => 'Fecha de pago',
            'conceptos_id' => 'Concepto',
            'CantidadPago' => 'Cantidad'
        ];
    }
}
