<div class="p-6 space-y-4">
    @foreach ($users as $user)
        <div class="flex items-center justify-between p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:scale-105 border border-gray-200">
            
            <!-- Información del usuario -->
            <div class="flex items-center">
                <!-- Imagen de usuario -->
                <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold text-xl">
                    {{ substr($user->name, 0, 1) }} <!-- Primera letra del nombre -->
                </div>

                <div class="ml-4">
                    <h4 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h4>
                </div>
            </div>

            <!-- Contador de recursos y botón -->
            <div class="flex items-center space-x-4">
                <!-- Contador de recursos -->
                <span class="text-sm font-semibold bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full">
                    📚 {{$user->recursos_count}}
                </span>

                <!-- Botón de Ver Recursos -->
                <a href="{{ route('usuarios.publico.recursos', $user->id) }}" 
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow-md transition duration-300">
                    Ver Recursos
                </a>
            </div>

        </div>
    @endforeach
</div>
