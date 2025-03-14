<?php

namespace App\Livewire\Recursos;

use App\Models\Recurso;
use Livewire\Component;
use Livewire\Attributes\On;

class MostrarRecursos extends Component
{
    // Escuchar el evento desde el frontend para eliminar un recurso
    #[On('eliminarRecurso')]
    public function eliminarRecurso($id)
    {
        $recurso = Recurso::where('id', $id)->first();
        $elemteoBorrado = $recurso;
        $elemteoBorrado->delete();
        session()->flash('alerta', '¡Recurso eliminado con éxito!');
    }


    #[On('cambiarPrivacidad')]
    public function cambiarPrivacidad($id)
    {
        $recurso = Recurso::where('id', $id)->first();
        if (!$recurso) {
            session()->flash('error', 'Recurso no encontrado.');
            return;
        }
        $recurso->privacidad = !$recurso->privacidad;
        $recurso->save();
        session()->flash('alerta', '¡Privacidad cambiada con éxito!');
    }


    public function render()
    { 
        //dd(Recurso::with('tematica')->get());
        if (request('search')) {
            $recursos = Recurso::search(request('search'))->where('user_id',  auth()->user()->id)->get();
        } else {
            $recursos = Recurso::where('user_id', auth()->user()->id)->get();    
        }
        return view('livewire.recursos.mostrar-recursos', [
            'recursos' => $recursos
        ]);
    }
}
