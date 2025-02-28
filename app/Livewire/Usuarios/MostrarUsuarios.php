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
        if (request('search')) {
            $users = User::where('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->withCount(['recursos' => function ($query) {
                    $query->where('privacidad', false);
                }])->get();
        } else {
            $users = User::withCount(['recursos' => function ($query) {
                $query->where('privacidad', false);
            }])->get();
        }
        return view('livewire.usuarios.mostrar-usuarios', [
            'users' => $users,
        ]);
    }
}
