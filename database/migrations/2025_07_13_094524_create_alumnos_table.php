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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique(); // Agregado campo DNI único
            $table->string('nombre');
            $table->string('apellidos');
            $table->enum('genero', ['masculino', 'femenino', 'otro'])->nullable();
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('pais')->nullable();
            $table->string('curso')->nullable();
            $table->string('grupo')->nullable();
            $table->string('foto_perfil')->nullable();
            $table->boolean('activo')->default(true);
            $table->foreignId('id_centro')->constrained('centros')->onDelete('cascade'); // Agregado onDelete('cascade')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
