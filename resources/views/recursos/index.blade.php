<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         
                
                <!-- Botón para Crear Nuevo Recurso -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">📚 Lista de mis Recursos</h3>
                    <a href="{{ route('recursos.create') }}" class="dark:bg-gray-800 text-white px-4 py-2 rounded-md shadow">
                        ✏️ {{ __('Crear Recurso') }}
                    </a>
                </div>

               <livewire:recursos.mostrar-recursos />
        
        </div>
    </div>
</x-app-layout>
