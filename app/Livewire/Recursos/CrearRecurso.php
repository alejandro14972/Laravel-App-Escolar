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
    public $adjunto;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required',
        'description' => 'required|string',
        'tematica' => 'required|numeric',
        'privacidad' => 'boolean',
        'adjunto' => 'mimes:jpeg,png,jpg,pdf,doc,docx,pptx,xls,xlsx|max:5024', // Adjuntos opcionales
    ];

    public function saveRecurso()
    {
        $datos = $this->validate();

        $adjunto = $this->adjunto->store('recursos', 'public');
        $nombreAdjunto = str_replace('recursos/', '', $adjunto);


        Recurso::create([
            'recurso_nombre' => $datos['titulo'],
            'recurso_descripcion' => $datos['description'],
            'id_tematica' => $datos['tematica'],
            'privacidad' => $datos['privacidad'],
            'adjunto' => $nombreAdjunto,
            'user_id' => auth()->user()->id,
        ]);

          //crear mensaje de exito
          session()->flash('alerta', '¡Recurso creado con éxito!');
          return redirect()->route('recursos.index');
    }


    public function render()
    {
        $tematicas = Tematica::all();
        return view('livewire.recursos.crear-recurso', [
            'tematicas' => $tematicas
        ]);
    }
}
