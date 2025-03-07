<?php

namespace App\Livewire\Usuarios;

use App\Models\Recurso;
use Livewire\Component;

class MostrarRecursosUsuarios extends Component
{

    public $user_id;

    // Se recibe el ID al inicializar el componente, me llega de la vista 
    public function mount($id)
    {
        $this->user_id = $id;
    }

    public function render()
    {

        if (!request('search')) {
            $recursos = Recurso::where('user_id', $this->user_id)
                ->where('privacidad', '0')
                ->get();
            $recursosCount = $recursos->count();
        } else {
            $recursos = Recurso::search(request('search'))
                ->where('privacidad', '0')
                ->where('user_id', $this->user_id)
                ->get();
            $recursosCount = $recursos->count();
        }

        return view('livewire.usuarios.mostrar-recursos-usuarios', [
            'recursos' => $recursos,
            'recursosCount' => $recursosCount,
        ]);
    }
}
