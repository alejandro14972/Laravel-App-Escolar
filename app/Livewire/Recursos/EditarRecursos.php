<?php

namespace App\Livewire\Recursos;

use App\Models\Recurso;
use Livewire\Component;
use App\Models\Tematica;
use Livewire\WithFileUploads;

class EditarRecursos extends Component
{

    use WithFileUploads;

    //campos del formulario
    public $recurso_id;
    public $titulo;
    public $description;
    public $tematica;
    public $privacidad = false;
    public $adjunto;
    public $adjuntoNuevo;

    protected $rules = [
        'titulo' => 'required',
        'description' => 'required|string',
        'tematica' => 'required|numeric',
        'privacidad' => 'boolean',
        'adjuntoNuevo' => 'nullable|mimes:jpeg,png,jpg,pdf,doc,docx,pptx,xls,xlsx|max:5024', // Adjuntos opcionales
    ];

    public function mount(Recurso $recurso)
    {
        $this->recurso_id = $recurso->id;
        $this->titulo = $recurso->recurso_nombre;
        $this->description = $recurso->recurso_descripcion;
        $this->tematica = $recurso->id_tematica;
        $this->privacidad = $recurso->privacidad == 0 ? false : true; //solucion para tener marcada la opcion de checkbox;
        $this->adjunto = $recurso->adjunto;
    }

    public function updateRecurso()
    {
        $datos = $this->validate();

        if ($this->adjuntoNuevo) {
            $adjunto = $this->adjuntoNuevo->store('recursos', 'public');
            $nombreAdjunto = str_replace('recursos/', '', $adjunto);
        } else {
            $nombreAdjunto = $this->adjunto;
        }



        $recurso = Recurso::find($this->recurso_id);
        $recurso->recurso_nombre = $datos['titulo'];
        $recurso->recurso_descripcion = $datos['description'];
        $recurso->id_tematica = $datos['tematica'];
        $recurso->privacidad = $datos['privacidad'];
        $recurso->adjunto = $nombreAdjunto;

        $recurso->save();

        session()->flash('alerta', '¡Recurso actualizado con éxito!');

        return redirect()->route('recursos.index');
    }

    public function render()
    {
        $tematicas = Tematica::all();
        return view('livewire.recursos.editar-recursos', [
            'tematicas' => $tematicas
        ]);
    }
}
