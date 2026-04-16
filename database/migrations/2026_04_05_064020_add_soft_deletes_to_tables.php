<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Soft delete para servicios
        if (Schema::hasTable('servicios') && !Schema::hasColumn('servicios', 'deleted_at')) {
            Schema::table('servicios', function (Blueprint $table) {
                $table->softDeletes();
            });
        }
        
        // Soft delete para productos
        if (Schema::hasTable('productos') && !Schema::hasColumn('productos', 'deleted_at')) {
            Schema::table('productos', function (Blueprint $table) {
                $table->softDeletes();
            });
        }
        
        // Soft delete para mascotas
        if (Schema::hasTable('mascotas') && !Schema::hasColumn('mascotas', 'deleted_at')) {
            Schema::table('mascotas', function (Blueprint $table) {
                $table->softDeletes();
            });
        }
        
        // Soft delete para citas
        if (Schema::hasTable('citas') && !Schema::hasColumn('citas', 'deleted_at')) {
            Schema::table('citas', function (Blueprint $table) {
                $table->softDeletes();
            });
        }
        
        // Soft delete para usuarios
        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'deleted_at')) {
            Schema::table('users', function (Blueprint $table) {
                $table->softDeletes();
            });
        }
    }

    public function down(): void
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('productos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('mascotas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('citas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};