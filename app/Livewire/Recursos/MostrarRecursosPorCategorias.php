<?php

namespace App\Livewire\Recursos;

use App\Models\Recurso;
use Livewire\Component;

class MostrarRecursosPorCategorias extends Component
{
    public $categoria_id;

    // Se recibe el ID al inicializar el componente
    public function mount($id)
    {
        $this->categoria_id = $id;
    }

    public function render()
    {
        // Se obtienen los recursos que pertenecen a la categoría y son de privacidad pública
        if (!request('search')) {
            $recursos = Recurso::where('id_tematica', $this->categoria_id)->where('privacidad', '0')->get();
            $recursosCount = $recursos->count();
        } else {
            $recursos = Recurso::search(request('search'))->where('privacidad', '0')->get();
            $recursosCount = $recursos->count();
        }


        return view('livewire.recursos.mostrar-recursos-por-categorias', [
            'recursos' => $recursos,
            'recursosCount' => $recursosCount,
        ]);
    }
}
