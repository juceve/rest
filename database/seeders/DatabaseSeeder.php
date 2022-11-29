<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(CatitemSeeder::class);
        \App\Models\Tipomenu::create([
            'nombre'=>'MERIENDA'
        ]);
        \App\Models\Tipomenu::create([
            'nombre'=>'ALMUERZO'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678')
        ])->assignRole('SuperAdmin');

        \App\Models\Moneda::create([
            'nombre'=>'BOLIVIANO',
            'abreviatura'=>'Bs.',
            'tasacambio'=>'6.86',
            'predeterminado'=>true,

        ]);
        \App\Models\Moneda::create([
            'nombre'=>'DOLAR',
            'abreviatura'=>'$us',
            'tasacambio'=>'1',
            'predeterminado'=>false,

        ]);
    }
}
