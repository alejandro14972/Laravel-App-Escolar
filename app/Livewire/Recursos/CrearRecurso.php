<?php

namespace App\Livewire\Recursos;

use App\Models\Recurso;
use Livewire\Component;
use App\Models\Tematica;
use Livewire\WithFileUploads;

class CrearRecurso extends Component
{
    public $titulo;
    public $description;
    public $tematica;
    public $privacidad = false;
    public $adjuntos = [];

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required',
        'description' => 'required|string',
        'tematica' => 'required|numeric',
        'privacidad' => 'boolean',
        'adjuntos.*' => 'required|mimes:jpeg,png,jpg,pdf,doc,docx,pptx,xls,xlsx|max:5024', // Adjuntos opcionales
    ];

    public function saveRecurso()
    {
        $datos = $this->validate();

        // Array para guardar los nombres de los archivos subidos
        $nombresAdjuntos = [];
        foreach ($this->adjuntos as $adjunto) {
            $ruta = $adjunto->store('recursos', 'public');
            $nombresAdjuntos[] = str_replace('recursos/', '', $ruta);
        }

        Recurso::create([
            'recurso_nombre' => $datos['titulo'],
            'recurso_descripcion' => $datos['description'],
            'id_tematica' => $datos['tematica'],
            'privacidad' => $datos['privacidad'],
            'adjunto' => json_encode($nombresAdjuntos), // Guardar archivos como JSON
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('alerta', '¡Recurso creado con éxito!');
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
        return view('livewire.recursos.crear-recurso', [
            'tematicas' => $tematicas
        ]);
    }
}
