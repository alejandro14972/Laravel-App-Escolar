<div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">
    <div class="mb-6">
        <form method="GET" class="flex items-center space-x-2 p-3 ">
            <input 
                type="search" 
                name="search" 
                placeholder="🔍 Buscar un recurso..." 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" 
                value="{{ request()->get('search') }}"
            />
            <button 
                type="submit" 
                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200 shadow-md"
            >
                Buscar
            </button>
        </form>
    </div>
    @if ($recursos->isNotEmpty())
        @foreach ($recursos as $recurso)
            @php
                $priv = $recurso->privacidad == 1 ? 'Oculto' : 'Visible';
            @endphp

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition border-2 border-purple-200 dark:border-purple-800">
                <h4 class="text-xl font-semibold text-purple-600 dark:text-purple-400">
                    {{ $recurso->recurso_nombre }}
                </h4>
                <x-like-component :recurso="$recurso" />
                <button wire:click="$dispatch('mostrarAlerta2', { id: {{ $recurso->id }} })"
                    class="text-orange-600 dark:text-orange-400 hover:text-orange-700 dark:hover:text-orange-300 transition">
                    @if ($recurso->privacidad == 1)
                        🥷 {{ $priv }}
                    @else
                        👁️{{ $priv }}
                    @endif
                </button>
                <p class="text-sm text-gray-700 dark:text-gray-300 mt-2">
                    {{ Str::limit($recurso->recurso_descripcion, 500) }}
                </p>
                <p class="text-sm text-teal-600 dark:text-teal-400 mt-2">
                    Temática: {{ $recurso->tematica->tematica_nombre }}
                </p>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex space-x-4">
                        <a href="{{ route('recursos.show', $recurso->id) }}"
                            class="text-pink-600 dark:text-pink-400 hover:text-pink-700 dark:hover:text-pink-300 transition">
                            🔍 Ver más
                        </a>

                        <a href="{{ route('recursos.edit', $recurso->id) }}"
                            class="text-yellow-600 dark:text-yellow-400 hover:text-yellow-700 dark:hover:text-yellow-300 transition">
                            🖊️ Editar
                        </a>

                        <button wire:click="$dispatch('mostrarAlerta', { id: {{ $recurso->id }} })"
                            class="text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 transition">
                            ❌ Eliminar
                        </button>


                    </div>


                    <span class="text-xs text-gray-500 dark:text-gray-400">
                        {{ $recurso->created_at->format('d/m/Y') }}
                    </span>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-gray-600 dark:text-gray-400">No tienes recursos aún. ¡Crea uno nuevo! 😊</p>
    @endif
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            // Alerta para eliminar recurso
            Livewire.on('mostrarAlerta', (recursoId) => {
                Swal.fire({
                    title: '¿Eliminar recurso?',
                    text: "Un recurso eliminado no se puede recuperar.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('eliminarRecurso', recursoId);
                        Swal.fire(
                            'Eliminado!',
                            'El recurso fue eliminado correctamente.',
                            'success'
                        );
                    }
                });
            });

            // Alerta para cambiar privacidad
            Livewire.on('mostrarAlerta2', (recursoId) => {
                Swal.fire({
                    title: '¿Cambiar privacidad?',
                    text: "¿Estás seguro de que deseas cambiar la visibilidad de este recurso?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, cambiar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('cambiarPrivacidad', recursoId);
                        Swal.fire(
                            'Privacidad cambiada!',
                            'La visibilidad del recurso ha sido actualizada.',
                            'success'
                        );
                    }
                });
            });
        });
    </script>

    <script>
        @if (session()->has('alerta'))

            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('alerta') }}",
                showConfirmButton: false,
                timer: 2500
            });
        @endif
    </script>
@endpush
