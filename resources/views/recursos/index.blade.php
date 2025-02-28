<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Botón para Crear Nuevo Recurso -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">📚 Lista de mis Recursos</h3>
                <a href="{{ route('recursos.create') }}" class="bg-green-800 text-white px-4 py-2 rounded-md shadow">
                    ✏️ {{ __('Crear Recurso') }}
                </a>
            </div>

            <livewire:recursos.mostrar-recursos />
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if (session()->has('mensajeError'))
                Swal.fire({
                    position: "top-end",
                    icon: "error", // Cambia a "error" para mensajes de error
                    title: "{{ session('mensajeError') }}",
                    showConfirmButton: false,
                    timer: 2500
                });
            @endif
        </script>
    @endpush
</x-app-layout>
