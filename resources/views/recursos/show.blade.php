<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Componente Livewire -->
            <div>
                <livewire:recursos.mostrar-recurso-id :recurso="$recurso" />
            </div>

            <!-- Sección de comentarios -->
            <div class="md:w-full p-5">
                <!-- Formulario para agregar comentarios -->
                @auth
                    <div class="p-6 mb-8">
                        <form action="{{ route('comentarios.store', ['user' => $user, 'recurso' => $recurso]) }}" method="post">
                            @csrf
                            <div class="mb-5">
                                <label for="comentario" class="mb-2 block uppercase text-gray-600 font-bold">
                                    {{$user->name}}:
                                </label>
                                <textarea id="comentario" name="comentario" placeholder="Escribe tu comentario aquí..."
                                    class="border-2 border-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-sky-500
                                    @error('comentario') border-red-500 @enderror"></textarea>
                                @error('comentario')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                class="bg-sky-600 hover:bg-sky-700 transition-colors uppercase font-bold w-full p-3 text-white rounded-lg">
                                Añadir comentario
                            </button>
                        </form>
                    </div>
                @endauth

                <!-- Lista de comentarios -->
                <div class="p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">🗨️Comentarios:</h2>

                    <!-- Si hay comentarios -->
                    @if ($recurso->comentarios->count())
                        <div class="space-y-4 max-h-96 overflow-y-auto scroll-smooth">
                            @foreach ($recurso->comentarios as $comentario)
                                <div class="p-4 border-b border-gray-700 last:border-b-0">
                                    <b class="text-gray-950 text-gray-600">{{ $comentario->user->name }}</b>
                                    <p class="mt-3 text-gray-700">{{ $comentario->comentario }}</p>

                                    <p class="text-xs text-gray-500 mt-2">
                                        {{ $comentario->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Si no hay comentarios -->
                        <p class="text-center text-gray-600 py-6">No hay comentarios aún. ¡Sé el primero en comentar!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>