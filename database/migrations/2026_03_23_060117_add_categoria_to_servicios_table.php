<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->string('categoria')->after('nombre')->default('baño');
            $table->boolean('es_paquete')->default(false)->after('activo');
            $table->json('servicios_incluidos')->nullable()->after('es_paquete');
        });
    }

    public function down(): void
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropColumn(['categoria', 'es_paquete', 'servicios_incluidos']);
        });
    }
};