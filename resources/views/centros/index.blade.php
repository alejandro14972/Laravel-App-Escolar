<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">📚 Centros</h3>
                <p class="text-gray-600 dark:text-white mt-2">Aquí puedes ver y asociarte a un centro educativo.</p>
            <livewire:centros.mostrar-centros />
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
