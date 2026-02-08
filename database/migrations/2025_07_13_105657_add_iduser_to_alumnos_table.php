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
    Schema::table('alumnos', function (Blueprint $table) {
        $table->foreignId('user_id')
              ->after('id_centro') // opcional, para ubicar el campo
              ->constrained('users')
              ->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('alumnos', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}

};
