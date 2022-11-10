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
        // \App\Models\User::factory(10)->create();

        // ['razonsocial' =>'asd',
        // 'direccion' =>'asd',
        // 'telefono' =>'asd',
        // 'email' =>'asd',
        // 'nit' =>'asd',
        // 'avatar' =>'asd',
        // 'responsable' =>'asd',
        // 'telefono_responsable' =>'asd',]
        \App\Models\User::factory()->create([
            'name' => 'Julio Veliz',
            'email' => 'julio@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
