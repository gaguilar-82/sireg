<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAsignado extends FormRequest
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
            'posesionarios_id' => 'required|unique:asignados,posesionarios_id',
            'lotes_id' => 'required|unique:asignados,lotes_id',
            'ClaveContrato' => 'required|unique:asignados,ClaveContrato',
            'CostoLote' => 'required',
            'CostoEscrituras' => 'required',
            'FechaContrato' => 'required',
            'TipoContrato' => 'required',
            'Mensualidades' => 'required',
        ];

    }

    public function attributes()
    {
        return [
            'posesionarios_id' => 'Nombre del posesionario',
            'lotes_id' => 'Lote por asignar',
            'ClaveContrato' => 'Clave del contrato',
            'CostoLote' => 'Costo del lote',
            'FechaContrato' => 'Fecha del contrato',
            'TipoContrato' => 'Tipo del contrato',
        ];
    }
}
