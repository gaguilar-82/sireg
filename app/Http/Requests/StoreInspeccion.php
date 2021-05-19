<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInspeccion extends FormRequest
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
            'inspectors_id' => 'required',
            'FechaInspeccion' => 'required',
            'UsoVivienda' => 'required',
            'MaterialVivienda' => 'required',
            'MaterialMuros' => 'required',
            'MaterialTecho' => 'required',
            'MaterialPiso' => 'required',
            'ZAR' => 'required',
            'EnergiaElectrica' => 'required',
            'AguaPotable' => 'required',
            'Drenaje' => 'required',
            'Antiguedad' => 'required', 
            'Habitantes' => 'required',
            'Habitaciones' => 'required',
            'GastoAlimentacion' => 'required',
            'GastoSalud' => 'required',
            'GastoEducacion' => 'required',
            'GastoOtros' => 'required',
            'GastoTotal' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'asignados_id' => 'Nombre del posesionario',
            'inspectors_id' => 'Nombre del inspector',
            'FechaInspeccion' => 'Fecha de inspección',
            'UsoVivienda' => 'Uso de la vivienda',
            'MaterialVivienda' => 'Material de la vivienda',
            'MaterialMuros' => 'Material de los muros',
            'MaterialTecho' => 'Material del techo',
            'MaterialPiso' => 'Material del piso',
            'ZAR' => 'Zona de Alto Riesgo',
            'EnergiaElectrica' => 'Energía eléctrica',
            'AguaPotable' => 'Agua potable',
            'Antiguedad' => 'Antigüedad',
            'GastoAlimentacion' => 'Gasto en alimentación',
            'GastoSalud' => 'Gasto en salud',
            'GastoEducacion' => 'Gasto en educación',
            'GastoOtros' => 'Otros gastos',
        ];
    }

}
