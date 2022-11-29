<?php

namespace Database\Seeders;

use App\Models\Catitem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catitem::create([
            "nombre" => "BOLLERIA",
        ]);
        Catitem::create([
            "nombre" => "BEBIDA",
        ]);
        Catitem::create([
            "nombre" => "FRUTA",
        ]);
        Catitem::create([
            "nombre" => "SOPA",
        ]);
        Catitem::create([
            "nombre" => "SEGUNDO",
        ]);
        Catitem::create([
            "nombre" => "ENSALADA",
        ]);
        Catitem::create([
            "nombre" => "GUARNICION",
        ]);
        Catitem::create([
            "nombre" => "POSTRE",
        ]);
        Catitem::create([
            "nombre" => "REFRESCO",
        ]);
        
    }
}
