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
        'adjunto' => 'mimes:jpeg, png, jpg, pdf, PDF, doc, docx, pptx, excel|max:5024',
    ];

    public function saveRecurso()
    {
        $datos = $this->validate();

        //dd($datos);

        Recurso::create([
            'recurso_nombre' => $datos['titulo'],
            'recurso_descripcion' => $datos['description'],
            'id_tematica' => $datos['tematica'],
            'privacidad' => $datos['privacidad'],
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
