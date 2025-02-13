<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TematicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tematicas = [
            'Matemáticas',
            'Ciencias Naturales',
            'Lengua y Literatura',
            'Historia',
            'Geografía',
            'Física',
            'Química',
            'Biología',
            'Educación Física',
            'Arte y Cultura',
            'Música',
            'Informática',
            'Programación',
            'Emprendimiento',
            'Economía',
            'Filosofía',
            'Psicología',
            'Sociología',
            'Pedagogía',
            'Inglés',
            'Francés',
            'Alemán',
            'Italiano',
            'Portugués',
            'Chino',
            'Robótica',
            'Astronomía'
        ];

        foreach ($tematicas as $tematica) {
            DB::table('tematica')->insert([
                'tematica_nombre' => $tematica,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
