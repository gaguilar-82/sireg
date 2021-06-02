<?php

namespace Database\Seeders;

use App\Models\Concepto;
use Illuminate\Database\Seeder;

class ConceptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $claves = ["IP-0001",
                  "IP-0001-A",
                  "IP-0001-B",
                  "IP-0001-C",
                  "IP-0002",
                  "IP-0002-A",
                  "IP-0002-B",
                  "IP-0003",
                  "IP-0004",
                  "IP-0005",
                  "IP-0006",
                  "IP-0007",
                  "IP-0008",
                  "IP-0009",
                  "IP-0010",
                  "IP-0011",
                  "IP-0012",
                  "IP-0013",
                  "IP-0014",
                  "IP-0015",
                  "IP-0016",
                  "IP-0017",
                  "IP-0018",
                  "IP-0019",
                  "IP-0020",
                  "IP-0021",
                  "IP-0022",
                  "IP-0023",
                  "IP-0024",
                  "IP-0025",
                  "IP-0026",
                  "IP-0027",
                  "IP-0028",
                  "IP-0029",
                  "IP-0030",
                  "IP-0031",
                  "IP-0032",
                ];

        $conceptos = ["INGRESOS POR VENTA DE TERRENOS DE CONTADO",
                        "ENGANCHE POR VENTA DE TERRENOS",
                        "AMORTIZACION POR VENTA DE TERRENOS",
                        "INDEMNIZACION POR TERRENOS",
                        "INGRESOS POR SERVICIOS DE ESCRITURACION",
                        "INSCRIPCION DE LOTE URBANO ANTE EL R.P.P.",
                        "INSCRIPCION DE LOTE RUSTICO ANTE EL R.P.P.",
                        "INGRESOS POR INTERESES NORMALES",
                        "INGRESOS POR INTERESES MORATORIOS",
                        "COMISION POR COBRANZA",
                        "CESION DE DERECHOS",
                        "RECTIFICACION DE MEDIDAS DE LOTE",
                        "INSPECCION OCULAR Y/O FISICA",
                        "RECONOCIMIENTO DE DERECHOS",
                        "CERTIFICACION DE RECIBO DE COBRO",
                        "RATIFICACION DE CONVENIO ANTE NOTARIO",
                        "CANCELACION DE TRAMITE DE ESCRITURA",
                        "CONSTANCIA PARA CATASTRO POR CAMBIO DE PROPIETARIO",
                        "RECTIFICACION DE ESCRITURA",
                        "CANCELACION DE CLAUSULAS DE PATRIMONIO FAMILIAR Y DERECHO DEL TANTO (PREVIO A LA EMISION DE ESCRITURA)",
                        "CONTRATO DE CANCELACION DE CLAUSULAS ( PATRIMONIO FAMILIAR Y DERECHO DEL TANTO)",
                        "CANCELACION DE ESCRITURA INSCRITA",
                        "COPIA FOTOSTATICA DE EXPEDIENTE",
                        "RECUPERACION POR RESCICION DE CONTRATO",
                        "SUBDIVISION DE LOTE",
                        "CONSTANCIA DE NO ADEUDO",
                        "CONSTANCIA DE PROPIEDAD",
                        "COPIA DE PLANO",
                        "TRABAJOS TECNICOS Y SOCIALES",
                        "FUSION DE LOTES",
                        "TRAMITES EN EL REGISTRO PUBLICO DE LA PROPIEDAD",
                        "ELABORACION DE CROQUIS",
                        "LEVANTAMIENTOS TOPOGRAFICOS",
                        "DIFERENCIA EN FINIQUITO",
                        "INGRESOS POR SERVICIOS DE REGULARIZACION",
                        "ANOTACIONES Y CANCELACIONES DE ESCRITURA ANTE EL R.P.P.",
                        "OTROS INGRESOS",
                    ];
       
        $valor = [  "0",
                    "0",
                    "0",
                    "0",
                    "4658",
                    "0",
                    "0",
                    "0",
                    "0",
                    "0",
                    "4105",
                    "479",
                    "479",
                    "6842",
                    "108",
                    "1293",
                    "539",
                    "216",
                    "4105",
                    "6842",
                    "6842",
                    "4105",
                    "411",
                    "0",
                    "0",
                    "452",
                    "429",
                    "137",
                    "479",
                    "0",
                    "0",
                    "108",
                    "0",
                    "0",
                    "1401",
                    "0",
                    "0",
                ];

        for ($item=0; $item < count($claves); $item++) 
        {
            foreach ($claves as $clave) 
            {
                $clave = new Concepto;
                $clave->Clave = $claves[$item];
                $clave->NombreConcepto = $conceptos[$item];
                $clave->ValorConcepto = $valor[$item];
            }       
            $clave->save(); 
        }
    }
}
