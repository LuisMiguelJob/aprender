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
        Schema::table('programs', function (Blueprint $table) {
            $table->foreignId('user_id')->after('folio')->constrained(); // Debemos de respetar el orden porque si no respeta el orden de columnas.
            // En caso de que ya tengamos registros, nos importa respetar que no haya nulos, por lo que podemos agregar un
            // ->default(1)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};
