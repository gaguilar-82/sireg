<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $municipios = ["ACAPULCO DE JUÁREZ",
                "AJUCHITLÁN DEL PROGRESO",
                "APAXTLA",
                "ARCELIA",
                "ATOYAC DE ÁLVAREZ",
                "AYUTLA DE LOS LIBRES",
                "CHILAPA DE ÁLVAREZ",
                "CHILPANCINGO DE LOS BRAVO",
                "COYUCA DE CATALÁN",
                "HUITZUCO DE LOS FIGUEROA",
                "IGUALA DE LA INDEPENDENCIA",
                "LA UNION DE ISIDRO MONTES DE OCA",
                "OMETEPEC",
                "PUNGARABATO",
                "TAXCO DE ALARCÓN",
                "TECOANAPA",
                "TECPAN DE GALEANA",
                "TELOLOAPAN",
                "TIXTLA DE GUERRERO",
                "TLALCHAPA",
                "TLAPA DE COMONFORT",
                "ZIHUATANEJO DE AZUETA",   
              ];

    $delegaciones = ["DA",
                      "DTC",
                      "DN",
                      "DTC",
                      "DCG",
                      "DCC",
                      "DC",
                      "DC",
                      "DTC",
                      "DN",
                      "DN",
                      "DCG",
                      "DCC",
                      "DTC",
                      "DN",
                      "DCC",
                      "DCG",
                      "DN",
                      "DC",
                      "DTC",
                      "DM",
                      "DCG",      
            ];

      for ($item=0; $item < count($municipios); $item++) {
        foreach ($municipios as $municipio) {
            $municipio = new Municipio;
            $municipio->NombreMunicipio = $municipios[$item];
            $municipio->Delegacion = $delegaciones[$item];
          }       
          $municipio->save(); 
        }
  }
}

