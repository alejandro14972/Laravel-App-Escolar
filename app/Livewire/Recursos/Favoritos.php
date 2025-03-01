<?php

namespace App\Livewire\Recursos;

use Livewire\Component;

class Favoritos extends Component
{
    public function render()
    {
        $user = auth()->user();
        $recursos = $user->likes()->get()->pluck('recurso');
        //dd($user->likes()->get()->pluck('recurso'));  
        //dd($user->likes()->with('recurso')->get());
        return view('livewire.recursos.favoritos', [
            'recursos' => $recursos
        ]);
        
    }
}
