<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Verificar si la columna existe en servicios
        if (Schema::hasTable('servicios') && Schema::hasColumn('servicios', 'imagen')) {
            // Primero, asegurar que la columna pueda ser nula temporalmente
            DB::statement('ALTER TABLE servicios MODIFY imagen TEXT NULL');
        }
        
        // Verificar si la columna existe en productos
        if (Schema::hasTable('productos') && Schema::hasColumn('productos', 'imagen')) {
            // Primero, asegurar que la columna pueda ser nula temporalmente
            DB::statement('ALTER TABLE productos MODIFY imagen TEXT NULL');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('servicios') && Schema::hasColumn('servicios', 'imagen')) {
            DB::statement('ALTER TABLE servicios MODIFY imagen VARCHAR(255) NULL');
        }
        
        if (Schema::hasTable('productos') && Schema::hasColumn('productos', 'imagen')) {
            DB::statement('ALTER TABLE productos MODIFY imagen VARCHAR(255) NULL');
        }
    }
};