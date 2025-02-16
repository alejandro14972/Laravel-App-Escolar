<?php

namespace App\Livewire\Recursos;

use App\Models\Recurso;
use Livewire\Component;
use App\Models\Tematica;
use Livewire\WithFileUploads;

class EditarRecursos extends Component
{
    use WithFileUploads;

    // Campos del formulario
    public $recurso_id;
    public $titulo;
    public $description;
    public $tematica;
    public $privacidad = false;
    public $adjuntos;
    public $adjuntosNuevo = [];

    protected $rules = [
        'titulo' => 'required',
        'description' => 'required|string',
        'tematica' => 'required|numeric',
        'privacidad' => 'boolean',
        'adjuntosNuevo.*' => 'nullable|mimes:jpeg,png,jpg,pdf,doc,docx,pptx,xls,xlsx|max:5024', // Adjuntos opcionales
    ];

    public function mount(Recurso $recurso)
    {
        $this->recurso_id = $recurso->id;
        $this->titulo = $recurso->recurso_nombre;
        $this->description = $recurso->recurso_descripcion;
        $this->tematica = $recurso->id_tematica;
        $this->privacidad = $recurso->privacidad == 1; // Convertir a booleano
        $this->adjuntos = json_decode($recurso->adjunto, true) ?? [];
    }

    public function updateRecurso()
    {
        $this->validate();

        $nombresAdjuntos = $this->adjuntos; //aquí guardamos los nombres de los adjuntos que ya existen

        if (!empty($this->adjuntosNuevo)) {
            foreach ($this->adjuntosNuevo as $adjuntoNuevo) {
                $ruta = $adjuntoNuevo->store('recursos', 'public');
                $nombresAdjuntos[] = str_replace('recursos/', '', $ruta);
            }
        }

        $recurso = Recurso::find($this->recurso_id);
        $recurso->update([
            'recurso_nombre' => $this->titulo,
            'recurso_descripcion' => $this->description,
            'id_tematica' => $this->tematica,
            'privacidad' => $this->privacidad,
            'adjunto' => json_encode($nombresAdjuntos),
        ]);

        session()->flash('alerta', '¡Recurso actualizado con éxito!');

        return redirect()->route('recursos.index');
    }

    public function removeAdjunto($index)
    {
        unset($this->adjuntos[$index]);
        $this->adjuntos = array_values($this->adjuntos);
    }

    public function render()
    {
        $tematicas = Tematica::all();
        return view('livewire.recursos.editar-recursos', [
            'tematicas' => $tematicas
        ]);
    }
}