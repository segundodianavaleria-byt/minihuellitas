<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mascotas', function (Blueprint $table) {
            if (!Schema::hasColumn('mascotas', 'foto')) {
                $table->string('foto')->nullable()->after('observaciones_medicas');
            }
        });
    }

    public function down(): void
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};