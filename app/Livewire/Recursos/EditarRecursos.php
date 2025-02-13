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


    protected $rules = [
        'titulo' => 'required',
        'description' => 'required|string',
        'tematica' => 'required|numeric',
        'privacidad' => 'boolean',
        'adjunto' => 'mimes:jpeg, png, jpg, pdf, PDF, doc, docx, pptx, excel|max:5024',
    ];



    public function mount(Recurso $recurso)
    {
        $this->recurso_id = $recurso->id;
        $this->titulo = $recurso->recurso_nombre;
        $this->description = $recurso->recurso_descripcion;
        $this->tematica = $recurso->id_tematica;
        $this->privacidad = $recurso->privacidad == 0 ? false : true; //solucion para tener marcada la opcion de checkbox;
    }



    public function updateRecurso(){
        $datos = $this->validate();


        $recurso = Recurso::find($this->recurso_id);

        $recurso->recurso_nombre = $datos['titulo'];
        $recurso->recurso_descripcion = $datos['description'];
        $recurso->id_tematica = $datos['tematica'];
        $recurso->privacidad = $datos['privacidad'];

        $recurso->save();

        session()->flash('alerta', '¡Recurso actualizado con éxito!');

        //redireccionar
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
