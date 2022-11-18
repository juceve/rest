<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cedula');
            $table->string('direccion');
            $table->string('telefono');
            $table->date('fecnacimiento')->nullable();
            $table->string('email');
            $table->foreignId('cargoempleado_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('empresa_id')->nullable()->constrained();
            $table->foreignId('sucursale_id')->nullable()->constrained();
            $table->string('avatar')->default('avatars/empleados/noImagen.jpg');
            $table->boolean('estado')->nullable()->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
