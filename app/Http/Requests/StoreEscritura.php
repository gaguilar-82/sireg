<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEscritura extends FormRequest
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
            'FolioEscritura' => 'required|unique:escrituras,FolioEscritura',
            'FechaEscritura' => 'required',
            'asignados_id' => 'required|unique:escrituras,asignados_id',
            'directors_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'FolioEscritura' => 'Folio de la escritura',
            'FechaEscritura' => 'Fecha de elaboración',
            'asignados_id' => 'Nombre del Posesionario',
            'directors_id' => 'Nombre del director',
        ];
    }
}
