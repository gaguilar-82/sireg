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
    $municipios = ["Acapulco de Juárez",
                "Ajuchitlán del Progreso",
                "Apaxtla",
                "Arcelia",
                "Atoyac de Álvarez",
                "Ayutla de los Libres",
                "Chilapa de Álvarez",
                "Chilpancingo de los Bravo",
                "Coyuca de Catalán",
                "Huitzuco de los Figueroa",
                "Iguala de la Independencia",
                "La Union de Isidro Montes de Oca",
                "Ometepec",
                "Pungarabato",
                "Taxco de Alarcón",
                "Tecoanapa",
                "Tecpan de Galeana",
                "Teloloapan",
                "Tixtla de Guerrero",
                "Tlalchapa",
                "Tlapa de Comonfort",
                "Zihuatanejo de Azueta",   
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

