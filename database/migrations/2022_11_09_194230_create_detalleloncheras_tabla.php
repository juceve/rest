<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleloncheras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('menu_id')->constrained();
            $table->foreignId('lonchera_id')->constrained();
            $table->boolean('entregado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalleloncheras');
    }
};
