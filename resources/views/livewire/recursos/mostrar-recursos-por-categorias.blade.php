<div>
    <div class="flex justify-self-end mb-6">
        <form method="GET" class="flex items-center space-x-2 p-3 ">
            <input 
                type="search" 
                name="search" 
                placeholder="🔍 Buscar un recurso..." 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" 
                value="{{ request()->get('search') }}"
            />
            <button 
                type="submit" 
                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200 shadow-md"
            >
                Buscar
            </button>
        </form>
    </div>
    

    @if ($recursos->isNotEmpty())
        <!-- Contador de Recursos -->
        <div class="flex justify-between items-center p-4 ">
            <h2 class="text-lg font-semibold text-gray-800">📚 Recursos Disponibles de
                {{ $recursos->first()->tematica->tematica_nombre }}</h2>
            <span class="text-xl font-bold text-indigo-600 bg-indigo-100 px-4 py-1 rounded-full shadow-sm">
                {{ $recursosCount }}
            </span>
        </div>

        <!-- Mostrar Recursos Dinámicamente -->
        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">

            @foreach ($recursos as $recurso)
                @php
                    $priv = $recurso->privacidad == 1 ? 'Privado' : 'Público';
                @endphp

                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition border-2 border-purple-200 dark:border-purple-800">
                    <!-- Título del recurso -->
                    <h4 class="text-xl font-semibold text-purple-600 dark:text-purple-400">
                        {{ $recurso->recurso_nombre }}
                    </h4>

                    @auth
                        <div class="my-4">
                            @if ($recurso->checkLike(auth()->user()))
                                <form action="{{ route('recursos.likes.destroy', $recurso) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                        ❤️ <span class="font-medium">{{ $recurso->likes_count }}</span>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('recursos.likes.store', $recurso) }}" method="post">
                                    @csrf
                                    <button type="submit" class="text-gray-400 hover:text-pink-500 transition">
                                        🤍 <span class="font-medium">{{ $recurso->likes_count }}</span>
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endauth

                    <!-- Cambiar privacidad -->
                    <p
                        class="text-orange-600 dark:text-orange-400 hover:text-orange-700 dark:hover:text-orange-300 transition">
                        @if ($recurso->privacidad == 1)
                            🥷 {{ $priv }}
                        @else
                            👁️{{ $priv }}
                        @endif
                    </p>

                    <!-- Descripción -->
                    <p class="text-sm text-gray-700 dark:text-gray-300 mt-2">
                        {{ Str::limit($recurso->recurso_descripcion, 500) }}
                    </p>

                    <!-- Temática -->
                    <p class="text-sm text-teal-600 dark:text-teal-400 mt-2">
                        Temática: {{ $recurso->tematica->tematica_nombre }}
                    </p>

                    <!-- Temática -->
                    <p class="text-sm text-pink-600 dark:text-pink-400 mt-2">
                        Creado por: <i>{{ $recurso->user->name }}</i>
                    </p>

                    <div class="mt-4 flex justify-between items-center">
                        <div class="flex space-x-4">
                            <!-- Ver más -->
                            <a href="{{ route('recursos.show', $recurso->id) }}"
                                class="text-green-600 hover:text-green-700 transition">
                                🔍 Ver más
                            </a>
                        </div>

                        <!-- Fecha de creación -->
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $recurso->created_at->format('d/m/Y') }}
                        </span>
                    </div>
                </div>
            @endforeach
        @else
            <div class="flex justify-center">
                <p class="">No hay recursos de esta temática. 😊</p>
            </div>
    @endif
</div>
</div>
