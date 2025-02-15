<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Columna Izquierda: Formulario -->
    <form action="" method="post" wire:submit.prevent='updateRecurso' enctype="multipart/form-data" class="space-y-5">
        <div>
            <x-input-label for="titulo" :value="__('Título del recurso')" />
            <x-text-input id="titulo" class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm w-full"
                type="text" wire:model="titulo" required placeholder="Ejemplo: ¿Cómo innovar en educación?" />
            @error('titulo')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <x-input-label for="descripcion" :value="__('Descripción')" />
            <textarea id="descripcion" wire:model="description"
                class="border-gray-300 dark:border-gray-700 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                rows="7" required></textarea>
            @error('description')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <x-input-label for="tematica" :value="__('Temática')" />
            <select wire:model="tematica" id="tematica" class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm w-full">
                <option value="">-Seleccione temática--</option>
                @foreach ($tematicas as $t)
                    <option value="{{ $t->id }}">{{ $t->tematica_nombre }}</option>
                @endforeach
            </select>
            @error('tematica')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

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

        <div>
            <x-input-label for="adjuntoNuevo" :value="__('Adjuntar nuevo archivo')" />
            <x-text-input id="adjuntoNuevo" class="block mt-1 w-full" type="file" wire:model="adjuntoNuevo" />
            @error('adjuntoNuevo')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Editar recurso') }}
        </x-primary-button>
    </form>

    <!-- Columna Derecha: Visualización del adjunto -->
    <div class="">

        {{-- Documento actual --}}
        @if ($adjunto)
            <div class="mb-6">
                <p class="font-medium text-indigo-600 dark:text-indigo-400">Archivo actual:</p>
                @php
                    $ext = pathinfo($adjunto, PATHINFO_EXTENSION);
                @endphp
                @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{ asset('storage/recursos/' . $adjunto) }}" alt="Adjunto"
                        class="w-full h-auto rounded-lg shadow-md">
                @elseif ($ext === 'pdf')
                    <iframe src="{{ asset('storage/recursos/' . $adjunto) }}" class="w-full min-h-[300px]"></iframe>
                @else
                    <a href="{{ asset('storage/recursos/' . $adjunto) }}" class="text-blue-500 hover:underline"
                        download>Descargar archivo ({{ strtoupper($ext) }})</a>
                @endif
            </div>
        @endif

        {{-- Documento nuevo (si se subió) --}}
        @if ($adjuntoNuevo)
            <div>
                <p class="font-medium text-green-600 dark:text-green-400">Nuevo archivo preparado para subir:</p>
                @php
                    $extNuevo = pathinfo($adjuntoNuevo->getClientOriginalName(), PATHINFO_EXTENSION);
                @endphp
                @if (in_array($extNuevo, ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{ $adjuntoNuevo->temporaryUrl() }}" alt="Nuevo Adjunto"
                        class="w-full h-auto rounded-lg shadow-md">
                @elseif ($extNuevo === 'pdf')
                    <p class="text-green-500 text-sm mt-2">Archivo subido: {{ $adjuntoNuevo->getClientOriginalName() }}</p>
                @else
                    <p class="text-green-500 text-sm mt-2">Archivo subido: {{ $adjuntoNuevo->getClientOriginalName() }}</p>
                @endif
            </div>
        @endif
    </div>
</div>
