<?php

namespace Database\Factories;

use App\Models\Inspector;
use Illuminate\Database\Eloquent\Factories\Factory;

class InspectorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inspector::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NombreInspector' => $this->faker->name,
        ];
    }
}
