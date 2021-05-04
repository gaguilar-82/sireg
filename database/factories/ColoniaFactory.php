<?php

namespace Database\Factories;

use App\Models\Colonia;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColoniaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Colonia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NombreColonia' => $this->faker->sentence(),
            'TipoColonia' => $this->faker->randomElement(['Patrimonio INVISUR','Patrimonio CRETT', 'Parque Nacional El Veladero', 'Barrios Historicos', 'Donación Condicional']),
            'Municipio' => $this->faker->randomElement(['Acapulco de Juárez','Chilpancingo de los Bravo','Iguala de la Independencia','Zihuatanejo de Azueta', 'Taxco de Alarcón']),
            'ClaveColonia' => $this->faker->text($maxNbChars = 6) ,
            'ValorMetroCuadrado' => $this->faker->randomfloat($nbMaxDecimals = 2, $min = 0, $max = 20)
        ];
    }
}
