<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();  // ← Solo un $
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('mascota_id')->constrained()->onDelete('cascade');
            $table->foreignId('servicio_id')->constrained()->onDelete('cascade');
            $table->date('fecha');
            $table->time('hora');
            $table->text('observaciones')->nullable();
            $table->enum('estado', ['pendiente', 'confirmada', 'completada', 'cancelada'])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};