<?php

namespace App\Livewire\Calendar;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Calendario;
use Livewire\Attributes\On;

class MostrarEventos extends Component
{

    #[On('eventoCrear')]
    public function eventoCrear($event)
    {
        Calendario::create([
            'event' => $event['title'],
            'start_date' => Carbon::parse($event['start'])->format('Y-m-d H:i:s'),
            'end_date' => Carbon::parse($event['end'])->format('Y-m-d H:i:s'),
            'user_id' => auth()->user()->id
        ]);

        session()->flash('evento', '¡Evento creado con éxito!');
        return redirect()->route('calendario.index');
    }

    #[On('eventoActualizar')]
    public function eventoActualizar($updatEvent)
    {
        $event = Calendario::find($updatEvent['id']);

        $event->update([
            'start_date' => Carbon::parse($updatEvent['start'])->format('Y-m-d H:i:s'),
            'end_date' => Carbon::parse($updatEvent['end'])->format('Y-m-d H:i:s'),
        ]);

        session()->flash('evento', '¡Evento actualizado con éxito!');
        return redirect()->route('calendario.index');
    }


    #[On('eventoEliminar')]
    public function eventoEliminar($id)
    {
        //dd($id);
        $event = Calendario::find($id);
        $event->delete();
        session()->flash('evento', '¡Evento eliminado con éxito!');
        return redirect()->route('calendario.index');
    }

    public function render()
    {
        $allEvents = Calendario::where('user_id', auth()->user()->id)->get();

        $events = [];

        foreach ($allEvents as $event) {
            /* se necesita formatear el array para que full calendar lo entienda */
            $events[] = [
                'id'=> $event->id,
                'title' => $event->event,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        }

        return view('livewire.calendar.mostrar-eventos', [
            'allEvents' => $events
        ]);
    }
}
