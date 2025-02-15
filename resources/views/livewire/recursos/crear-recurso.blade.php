@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

<div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6 items-start">

    <!-- 🎯 Formulario de Creación de Recurso -->
    <form action="" method="post" class="space-y-5" wire:submit.prevent='saveRecurso' novalidate>
        @csrf

        <!-- Título -->
        <div>
            <x-input-label for="titulo" :value="__('Título del recurso')" />
            <x-text-input id="titulo" class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm w-full"
                type="text" wire:model="titulo" :value="old('titulo')" required
                placeholder="Por ejemplo: ¿Cómo innovar en educación?" />
            @error('titulo')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Descripción -->
        <div>
            <x-input-label for="descripcion" :value="__('Descripción')" />
            <textarea id="descripcion" wire:model="description"
                class="border-gray-300 dark:border-gray-700 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                rows="5" required></textarea>
            @error('description')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Temática -->
        <div>
            <x-input-label for="tematica" :value="__('Temática')" />
            <select wire:model="tematica" id="tematica"
                class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm w-full">
                <option value="">-Seleccione temática--</option>
                @foreach ($tematicas as $t)
                    <option value="{{ $t->id }}">{{ $t->tematica_nombre }}</option>
                @endforeach
            </select>
            @error('tematica')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Privacidad -->
        <div>
            <x-input-label for="privacidad" :value="__('Privacidad')" />
            <div class="flex items-center">
                <input id="privacidad" type="checkbox" wire:model="privacidad"
                    class="mr-2 border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                <label for="privacidad" class="text-gray-700">Recurso privado</label>
            </div>
            @error('privacidad')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Archivo adjunto -->
        <div>
            <x-input-label for="adjunto" :value="__('Adjunto')" />
            <x-text-input id="adjunto" class="block mt-1 w-full" type="file" wire:model="adjunto" />
            @error('adjunto')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botón de Enviar -->
        <x-primary-button class="w-full justify-center">
            {{ __('Crear recurso') }}
        </x-primary-button>
    </form>

    <!-- 📂 Formulario Dropzone -->
    <form action="{{ route('adjuntos.store') }}" method="POST" enctype="multipart/form-data" 
        id="dropzone"
        class="dropzone border-2 border-dashed border-gray-300 rounded-lg flex flex-col justify-center items-center w-full h-96 bg-gray-50 hover:bg-gray-100 transition">
        @csrf
        <p class="text-gray-600 text-center">Arrastra y suelta tus archivos aquí o haz clic para subir</p>
    </form>

</div>
