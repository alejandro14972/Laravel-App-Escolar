<?php

namespace App\Livewire\Recursos;

use Livewire\Component;

class MostrarRecursoId extends Component
{

    public $recurso;

    public function mount($recurso)
    {
        $this->recurso = $recurso;
    }


    public function render()
    {
        return view('livewire.recursos.mostrar-recurso-id');
    }
}
