<form action="" method="post" class="md:w-1/2 space-y-5" wire:submit.prevent='saveRecurso' novalidate enctype="mu">
    <div>
        <x-input-label for="titulo" :value="__('Título del recurso')" class="text-gray-950 dark:text-white"/>
        <x-text-input id="titulo" class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm w-full"
            type="text" wire:model="titulo" :value="old('titulo')" required
            placeholder="Por ejemplo: ¿Cómo innovar en educación?" />

        @error('titulo')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción')" class="text-gray-950 dark:text-white"/>
        <textarea id="descripcion" wire:model="description"
            class=" border-gray-300 dark:border-gray-700 text-gray-800  rounded-md shadow-sm w-full"
            rows="7" required>
        </textarea>
        @error('description')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <x-input-label for="tematica" :value="__('Temática')" class="text-gray-950 dark:text-white"/>
        <select wire:model="tematica" id="tematica"
            class=" border-gray-800   rounded-md shadow-sm w-full">
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
        <x-input-label for="privacidad" :value="__('Privacidad')" class="text-gray-950 dark:text-white"/>
        <div class="flex items-center">
            <input id="privacidad" type="checkbox" wire:model="privacidad"
                class="mr-2 border-gray-300 text-gray-950 rounded-md " />
            <label for="privacidad" class="text-gray-950 dark:text-white">Recurso privado</label>
        </div>
        @error('privacidad')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>



    <div>
        <label for="adjunto"
            class="flex items-center justify-center px-4 py-2 bg-yellow-500 hover:bg-yellow-500 text-white rounded-md cursor-pointer">
            <span>Seleccionar Archivos 📎</span>
            <input type="file" id="adjunto" class="hidden" wire:model="adjuntos" multiple />
        </label>

    </div>
    <div>
        {{-- Documentos nuevos (si se subieron) --}}
        @if ($adjuntos)
            <p class="font-medium text-green-600 dark:text-green-400 mb-2">
                Archivos preparados para subir:
            </p>

            <div class="space-y-3">
                @foreach ($adjuntos as $index => $adjunto)
                    @php
                        $extNuevo = pathinfo($adjunto->getClientOriginalName(), PATHINFO_EXTENSION);
                    @endphp

                    <div
                        class="p-4 bg-gray-100 dark:bg-gray-700 border rounded-lg shadow-md flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            @if (in_array($extNuevo, ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ $adjunto->temporaryUrl() }}" alt="Nuevo Adjunto"
                                    class="w-12 h-12 object-cover rounded-md shadow">
                            @else
                                <div
                                    class="w-12 h-12 flex items-center justify-center bg-gray-300 dark:bg-gray-600 rounded-md">
                                    📄
                                </div>
                            @endif

                            <div>
                                <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
                                    {{ $adjunto->getClientOriginalName() }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ strtoupper($extNuevo) }}
                                </p>
                            </div>
                        </div>

                        <!-- Botón para eliminar archivo -->
                        <button type="button" wire:click="removeAdjunto({{ $index }})"
                            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 text-sm flex items-center">
                            ❌ <span class="ml-1">Eliminar</span>
                        </button>
                    </div>
                @endforeach
            </div>
        @endif
    </div>



    <div>
        @error('adjuntos')
            <!-- Aplica la validación para cada archivo individualmente -->
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>



    <x-primary-button class="w-full justify-center">
        {{ __('Crear recurso') }}
    </x-primary-button>
</form>
