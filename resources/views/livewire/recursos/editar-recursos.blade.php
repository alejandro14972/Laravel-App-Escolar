<div class="flex flex-col gap-6 w-full">
    <!-- Formulario -->
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
            <x-text-input id="adjuntoNuevo" class="block mt-1 w-full" type="file" wire:model="adjuntosNuevo" multiple/>
            @error('adjuntosNuevo')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Archivos Adjuntos -->
        <div class="space-y-4">
            @if ($adjuntos)
                @foreach ($adjuntos as $index => $adjunto)
                    @php
                        $ext = pathinfo($adjunto, PATHINFO_EXTENSION);
                    @endphp
                    <div
                        class="p-4 bg-gray-100 dark:bg-gray-700 border rounded-lg shadow-md flex flex-col items-center">
                        @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ asset('storage/recursos/' . $adjunto) }}" alt="Adjunto"
                                class="w-32 h-32 object-cover rounded-md">
                        @elseif ($ext === 'pdf')
                            <iframe src="{{ asset('storage/recursos/' . $adjunto) }}"
                                class="w-full min-h-52 border rounded-lg"></iframe>
                        @else
                            📎 <a href="{{ asset('storage/recursos/' . $adjunto) }}" target="_blank"
                                class="text-blue-600 dark:text-blue-400">Descargar archivo</a>
                        @endif

                        <button type="button" wire:click="removeAdjunto({{ $index }})"
                            class="mt-3 px-4 py-2 bg-red-500 text-white text-sm font-semibold rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">
                            ❌ Eliminar
                        </button>
                    </div>
                @endforeach
            @endif

            @if ($adjuntosNuevo)
            @foreach ($adjuntosNuevo as $adjunto)
                <div class="p-4 bg-green-100 dark:bg-green-700 border rounded-lg shadow-md flex flex-col items-center">
                    <p class="font-medium text-green-600 dark:text-green-400">Nuevo archivo preparado para subir:</p>
                    @php
                        $extNuevo = pathinfo($adjunto->getClientOriginalName(), PATHINFO_EXTENSION);
                    @endphp
        
                    @if (in_array($extNuevo, ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ $adjunto->temporaryUrl() }}" alt="Nuevo Adjunto"
                            class="w-32 h-32 object-cover rounded-md">
                    @elseif ($extNuevo === 'pdf')
                        <p class="text-green-500 text-sm mt-2">Archivo subido:
                            {{ $adjunto->getClientOriginalName() }}</p>
                    @else
                        <p class="text-green-500 text-sm mt-2">Archivo subido:
                            {{ $adjunto->getClientOriginalName() }}</p>
                    @endif
                </div>
            @endforeach
        @endif
        </div>
        <x-primary-button class="w-full justify-center">
            {{ __('Editar recurso') }}
        </x-primary-button>
    </form>
</div>
