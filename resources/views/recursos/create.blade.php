<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis recursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl font-bold text-center mb-10">Publicar Recurso</h1>

                    <div class="md:flex md:justify-center p-5">
                        <livewire:recursos.crear-recurso />
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
