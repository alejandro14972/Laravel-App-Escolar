<div>
    <div id='calendar'></div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek', 
                locale: 'es', 
                firstDay: 1, // Inicia la semana en lunes
                themeSystem: document.documentElement.classList.contains('dark') ? 'darkly' :
                'standard', 

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día'
                },

                editable: true, // Permite arrastrar eventos
                selectable: true, // Permite seleccionar días
                selectMirror: true,

                events: @json($allEvents),

                // Al hacer clic en un evento, mostrar detalles
                eventClick: function(info) {
                    Swal.fire({
                    title: 'Evento: '+ info.event.title,
                    text: 'Programado para '+ info.event.start.toLocaleString(),
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('eventoEliminar', info.event.id);
                        Swal.fire(
                            'Eliminado!',
                            'El recurso fue eliminado correctamente.',
                            'success'
                        );
                    }
                });
                },

                // Permitir agregar eventos haciendo clic en una fecha
                select: function(info) {
                    let titulo = prompt("Ingrese el nombre del evento:");
                    if (titulo) {
                        let newEvent = {
                            title: titulo,
                            start: info.startStr,
                            end: info.endStr,
                            allDay: info.allDay
                        };

                        @this.call('eventoCrear', newEvent);

                    }
                },

                // Permitir arrastrar eventos y cambiar su fecha
                eventDrop: function(info) {
                    let updatedEvent = {
                        id: info.event.id,
                        start: info.event.startStr,
                        end: info.event.endStr,
                    };

                    console.log(updatedEvent);
                    @this.call('eventoActualizar', updatedEvent);

                },

                // Cambiar evento de tamaño
                eventResize: function(info) {
                    let resizedEvent = {
                        id: info.event.id,
                        start: info.event.startStr,
                        end: info.event.endStr,
                    };

                    @this.call('eventoActualizar', resizedEvent);
                }
                
            });

            calendar.render();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session()->has('evento'))
            /* dejar esta linea  */
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('evento') }}",
                showConfirmButton: false,
                timer: 2500
            });
        @endif
    </script>
@endpush
