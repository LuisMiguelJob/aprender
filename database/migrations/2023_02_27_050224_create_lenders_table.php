<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lenders', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('codigo', 20);
            $table->string('correo');
            $table->string('telefono', 30);

            //$table->unsignedBigInteger('carrera_id'); // Respetar primera palabra en singular
            //$table->foreign('carrera_id')->references('id')->on('carreras');

            $table->foreignId('carrera_id')->constrained(); // esta forma funciona igual como las dos linea de arriba.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lenders');
    }
};
