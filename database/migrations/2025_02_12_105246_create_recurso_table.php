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
        Schema::create('recursos', function (Blueprint $table) { // Corregido "resursos" → "recursos"
            $table->id();
            $table->string('recurso_nombre', 150);
            $table->string('recurso_descripcion', 5000);
            $table->foreignId('id_tematica')->constrained('tematica')->onDelete('cascade'); // Agregado onDelete('cascade')
            $table->boolean('privacidad')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Se mantiene, Laravel asume "users"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursos'); // Ahora elimina correctamente la tabla
    }
};
