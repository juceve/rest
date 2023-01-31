<?php

namespace Database\Seeders;

use App\Models\Catitem;
use App\Models\Estadopago;
use App\Models\Tipopago;
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

        Tipopago::create([
            "nombre" => "EFECTIVO - LOCAL",
            "abreviatura" => "EF",
        ]);
        Tipopago::create([
            "nombre" => "TRANSFERENCIA BANCARIA",
            "abreviatura" => "TB",
        ]);
        Tipopago::create([
            "nombre" => "PAGO QR",
            "abreviatura" => "QR",
        ]);

        Estadopago::create([
            "nombre" => "POR PAGAR",
            "abreviatura" => "PP",
        ]);
        Estadopago::create([
            "nombre" => "PAGO REALIZADO",
            "abreviatura" => "PR",
        ]);
        Estadopago::create([
            "nombre" => "PAGO ANULADO",
            "abreviatura" => "PA",
        ]);
    }
}
