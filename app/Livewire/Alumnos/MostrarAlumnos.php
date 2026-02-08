<?php

namespace App\Livewire\Alumnos;

use App\Models\Alumno as Alumno;
use Livewire\Component;

class MostrarAlumnos extends Component
{
    public function render()
    {
        $user = auth()->user();
        $alumnos = alumno::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('livewire.alumnos.mostrar-alumnos', compact('alumnos'));
    }
}
