<?php

namespace Database\Seeders;

use App\Models\Inspector;
use Illuminate\Database\Seeder;
use App\Models\Colonia;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Colonia::factory(20)->create();
        $this->call(RoleSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(ConceptoSeeder::class);
        $this->call(DirectorSeeder::class);

        Inspector::factory(20)->create();

        User::create([
            'name' => 'Gerardo Aguilar Sámano',
            'email' => 'aguilarsamano@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('P4ssw0rd.'),
            'remember_token' => Str::random(10)
        ])->assignRole('Admin');

        User::factory(19)->create();
         
    }
}
