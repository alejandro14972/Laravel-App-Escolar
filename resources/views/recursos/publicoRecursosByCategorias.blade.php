<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden ">
                <div class="p-6 text-gray-900">
                    <div class="p-5">
                        {{--el id se pasa tanto a la clase como a la vista --}}
                        <livewire:recursos.mostrar-recursos-por-categorias :id="$id_tematica" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>