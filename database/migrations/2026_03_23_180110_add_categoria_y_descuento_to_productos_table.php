<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('categoria')->after('nombre')->default('alimento');
            $table->decimal('precio_original', 8, 2)->nullable()->after('precio');
            $table->boolean('en_oferta')->default(false)->after('stock');
            $table->integer('descuento_porcentaje')->nullable()->after('en_oferta');
            $table->text('especificaciones')->nullable()->after('descripcion');
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn(['categoria', 'precio_original', 'en_oferta', 'descuento_porcentaje', 'especificaciones']);
        });
    }
};