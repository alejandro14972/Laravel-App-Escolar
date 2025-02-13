<form action="" method="post" class="md:w-1/2 space-y-5" wire:submit.prevent='updateRecurso' novalidate>
    <div>
        <x-input-label for="titulo" :value="__('Título del recurso')" />
        <x-text-input id="titulo" class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm w-full"
            type="text" wire:model="titulo" :value="old('titulo')" required
            placeholder="Por ejemplo: ¿Cómo innovar en educación?" />

        @error('titulo')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción')" />
        <textarea id="descripcion" wire:model="description"
            class=" border-gray-300 dark:border-gray-700  dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            rows="7" required>
        </textarea>
        @error('description')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <x-input-label for="tematica" :value="__('Temática')" />
        <select wire:model="tematica" id="tematica"
            class=" border-gray-300 dark:border-gray-700  rounded-md shadow-sm w-full">
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
            <label for="privacidad" class="text-gray-700 ">Recurso privado</label>
        </div>
        @error('privacidad')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>



    <div>
        <x-input-label for="adjunto" :value="__('Adjunto')" />
        <x-text-input id="adjunto" class="block mt-1 w-full" 
        type="file" 
        wire:model="adjunto" />

        @error('adjunto')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <x-primary-button class="w-full justify-center ">
        {{ __('Editar recurso') }}
    </x-primary-button>
</form>
