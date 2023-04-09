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
        Schema::create('lender_program', function (Blueprint $table) {
            $table->foreignId('program_id')->constrained(); // no se puede eleminar un programa, hasta que se eliminen los prestadores/lender
            $table->foreignId('lender_id')->constrained()->onDelete('cascade'); // Al borrar un prestador, se borraran todas las relaciones con el prestador (se borraran todas la relaciones programa/prestador)
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lender_program');
    }
};
