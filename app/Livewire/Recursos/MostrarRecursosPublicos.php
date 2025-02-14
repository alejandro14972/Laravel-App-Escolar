<?php

namespace App\Livewire\Recursos;

use App\Models\Recurso;
use App\Models\Tematica;
use Livewire\Component;

class MostrarRecursosPublicos extends Component
{
    public function render()
    {
        //$tematicas = Tematica::withCount('recursos')->get();

        
        // Obtener todas las temáticas con el conteo de recursos y la privacidad de los recursos es publica
        $tematicas = Tematica::withCount(['recursos' => function ($query) {
            $query->where('privacidad', false);
        }])->get();
    
        return view('livewire.recursos.mostrar-recursos-publicos', [
            'tematicas' => $tematicas
        ]);
    }
    
}
