<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Alumnos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoSeeder extends Seeder
{
    public function run(): void
    {
        Alumno::insert([
            [
                'DNI' => '12345678A',
                'nombre' => 'Carlos',
                'apellidos' => 'Ramírez López',
                'email' => 'carlos.ramirez@example.com',
                'telefono' => '612345678',
                'fecha_nacimiento' => '2005-03-14',
                'direccion' => 'Calle Falsa 123',
                'ciudad' => 'Madrid',
                'codigo_postal' => '28001',
                'pais' => 'España',
                'curso' => '4º ESO',
                'grupo' => 'A',
                'foto_perfil' => 'carlos.jpg',
                'activo' => true,
                'id_centro' => 1,
                'genero' => 'masculino',
                'user_id' => 1, 
            ],
            [
                'DNI' => '87654321B',
                'nombre' => 'Lucía',
                'apellidos' => 'Gómez Pérez',
                'email' => 'lucia.gomez@example.com',
                'telefono' => '698765432',
                'fecha_nacimiento' => '2006-11-02',
                'direccion' => 'Avenida del Sol 45',
                'ciudad' => 'Sevilla',
                'codigo_postal' => '41001',
                'pais' => 'España',
                'curso' => '3º ESO',
                'grupo' => 'B',
                'foto_perfil' => 'lucia.jpg',
                'activo' => true,
                'id_centro' => 1,
                'genero' => 'femenino',
                'user_id' => 1,
            ],
            [
                'DNI' => '23456789C',
                'nombre' => 'Andrés',
                'apellidos' => 'Martínez Ruiz',
                'email' => 'andres.martinez@example.com',
                'telefono' => '655443322',
                'fecha_nacimiento' => '2004-07-09',
                'direccion' => 'Calle Luna 12',
                'ciudad' => 'Valencia',
                'codigo_postal' => '46001',
                'pais' => 'España',
                'curso' => '1º Bachillerato',
                'grupo' => 'C',
                'foto_perfil' => 'andres.jpg',
                'activo' => false,
                'id_centro' => 1,
                'genero' => 'masculino',
                'user_id' => 1,
            ],
            [
                'DNI' => '98765432D',
                'nombre' => 'Marina',
                'apellidos' => 'Sánchez Gómez',
                'email' => 'marina.sanchez@example.com',
                'telefono' => '611223344',
                'fecha_nacimiento' => '2003-01-22',
                'direccion' => 'Plaza Mayor 3',
                'ciudad' => 'Barcelona',
                'codigo_postal' => '08001',
                'pais' => 'España',
                'curso' => '2º Bachillerato',
                'grupo' => 'D',
                'foto_perfil' => 'marina.jpg',
                'activo' => true,
                'id_centro' => 1,
                'genero' => 'femenino',
                'user_id' => 2,
            ],
        ]);
    }
}
