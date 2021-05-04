<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $director = new Director();

        $director->NombreDirector = "Celso";
        $director->ApellidoPaternoDirector = "Atrisco";
        $director->ApellidoMaternoDirector = "Nava";
        $director->FechaNacimientoDirector = "1963-04-06";
        $director->LugarNacimientoDirector = "Jalapa, Municipio de Quechultenango, Guerrero";
        $director->EstadoCivilDirector = "casado";
        $director->FechaNombramiento = "2020-05-07";
        $director->ExpedidoPor = "Héctor Antonio Astudillo Flores";
        $director->ActaPublica = "NUMERO 124,124(CIENTO VEINTICUATRO  MIL CIENTO VEINTICUATRO) VOLUMEN 1,377(UN MIL TRESCIENTOS SETENTA Y SIETE),  DE FECHA NUEVE DE FEBRERO DEL DOS MIL VEINTIUNO, POR LA  LICENCIADA ROSINA ROJAS CARRASCO, NOTARIO PUBLICO NUMERO DOS, DEL DISTRITO NOTARIAL DE TABARES";

        $director->save();
    }
}
