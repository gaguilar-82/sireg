<?php

namespace Database\Seeders;

use App\Models\Inspector;
use Illuminate\Database\Seeder;
use App\Models\Colonia;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Colonia::factory(20)->create();
        $this->call(MunicipioSeeder::class);
        $this->call(ConceptoSeeder::class);
        $this->call(DirectorSeeder::class);
        Inspector::factory(20)->create();
    }
}
