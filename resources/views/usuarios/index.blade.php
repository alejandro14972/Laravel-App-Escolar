<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis recursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <h1 class="text-4xl font-bold text-center mb-10">👤 Usuarios </h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <livewire:usuarios.mostrar-usuarios/>
        </div>
    </div>
</x-app-layout>
