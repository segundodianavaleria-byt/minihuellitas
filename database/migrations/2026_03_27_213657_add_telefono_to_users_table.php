<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'telefono')) {
                $table->string('telefono')->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'direccion')) {
                $table->string('direccion')->nullable()->after('telefono');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['telefono', 'direccion']);
        });
    }
};