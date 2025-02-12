<form action="" method="post" class="md:w-1/2 space-y-5" wire:submit.prevent='' novalidate>
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
            {{--  @foreach ($colores as $color)
                <option value="{{ $color->id }}">{{ $color->color }}</option>
            @endforeach --}}
        </select>
        @error('tematica')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <x-input-label for="privacidad" :value="__('Privacidad')" />
        <div class="flex items-center">
            <input id="iva" type="checkbox" wire:model="privacidad"
                class="mr-2 border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            <label for="privado" class="text-gray-700 ">Recurso privado</label>
        </div>
        @error('privacidad')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>



    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />

        {{-- vista de la imagen temporal --}}
        <div class="my-5">
            {{-- @if ($imagen)
                Imagen:
                <img src="{{ $imagen->temporaryUrl() }}">
            @endif --}}
        </div>


        @error('imagen')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <x-primary-button class="w-full justify-center ">
        {{ __('Crear recurso') }}
    </x-primary-button>
</form>
