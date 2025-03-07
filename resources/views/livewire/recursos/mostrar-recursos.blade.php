<div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">
    <div class="mb-6">
        <form method="GET" class="flex items-center space-x-2 p-3">
            <input type="search" name="search" placeholder="🔍 Buscar un recurso..."
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                value="{{ request()->get('search') }}" />
            <button type="submit"
                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200 shadow-md">
                Buscar
            </button>
        </form>
    </div>

    @if ($recursos->isNotEmpty())
        @foreach ($recursos as $recurso)
            @php
                $priv = $recurso->privacidad == 1 ? 'Oculto' : 'Visible';
            @endphp

            <div class="p-6 rounded-lg border-2 border-gray-400 bg-slate-300">
                <h4 class="text-xl font-semibold text-purple-600">
                    {{ $recurso->recurso_nombre }}
                </h4>
                <x-like-component :recurso="$recurso" />
                <button wire:click="$dispatch('mostrarAlerta2', { id: {{ $recurso->id }} })" class="text-orange-600">
                    @if ($recurso->privacidad == 1)
                        🥷 <span class="underline">{{ $priv }}</span>
                    @else
                        👁️ <span class="underline">{{ $priv }}</span>
                    @endif
                </button>
                <p class="text-sm text-gray-700 mt-2">
                    {{ Str::limit($recurso->recurso_descripcion, 500) }}
                </p>
                <p class="text-sm text-teal-600 mt-2">
                    Temática: {{ $recurso->tematica->tematica_nombre }}
                </p>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex space-x-4">
                        <a href="{{ route('recursos.show', $recurso->id) }}" class="text-pink-600">
                            🔍
                        </a>
                        <a href="{{ route('recursos.edit', $recurso->id) }}" class="text-yellow-600">
                            🖊️
                        </a>
                        <button wire:click="$dispatch('mostrarAlerta', { id: {{ $recurso->id }} })"
                            class="text-red-600">
                            ❌
                        </button>
                    </div>

                    <span class="text-xs text-gray-500">
                        {{ $recurso->created_at->format('d/m/Y') }}
                    </span>
                </div>
            </div>
        @endforeach
    @else
        @if (request('search'))
            <p class="text-gray-600 dark:text-white text-center">
                No se encontraron resultados para la búsqueda:
                <span class="font-semibold">{{ request('search') }}</span>
            </p>
        @else
            <p class="text-gray-600 dark:text-white text-center">
                No tienes recursos aún. ¡Crea uno nuevo! 😊
            </p>
        @endif
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
