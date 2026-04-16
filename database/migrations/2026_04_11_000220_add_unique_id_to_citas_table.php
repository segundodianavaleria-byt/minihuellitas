<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            // Primero, eliminar la restricción única si existe
            $table->dropUnique(['unique_id']);
            
            // Modificar la columna para que sea NOT NULL
            $table->string('unique_id')->nullable(false)->change();
            
            // Volver a agregar la restricción única
            $table->unique('unique_id');
        });
    }

    public function down(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dropUnique(['unique_id']);
            $table->string('unique_id')->nullable()->change();
            $table->unique('unique_id');
        });
    }
};