<?php

namespace App\Livewire\Centros;

use App\Models\Centro;
use Livewire\Component;

class MostrarCentros extends Component
{
    public function render()
    {
        $centros = Centro::paginate(10);
        return view('livewire.centros.mostrar-centros', compact('centros'));
    }
}
