<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'alumnos';

    protected $fillable = [
        'DNI',
        'nombre',
        'apellidos',
        'email',
        'telefono',
        'fecha_nacimiento',
        'direccion',
        'ciudad',
        'codigo_postal',
        'pais',
        'curso',
        'grupo',
        'foto_perfil',
        'activo',
        'id_centro',
        'genero',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
