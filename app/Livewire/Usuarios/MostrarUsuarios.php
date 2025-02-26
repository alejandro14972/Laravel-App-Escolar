<?php

namespace App\Livewire\Usuarios;

use App\Models\User;
use App\Models\Usuario;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MostrarUsuarios extends Component
{
    public function render()
    {
        $users = User::withCount(['recursos' => function ($query) {
            $query->where('privacidad', false);
        }])->get();

            //dd($conteo);

        return view('livewire.usuarios.mostrar-usuarios', [
            'users' => $users,
           
        ]);
    }
}
