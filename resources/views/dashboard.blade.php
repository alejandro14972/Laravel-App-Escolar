<x-app-layout>
    <div class="flex min-h-screen">
        <!-- Contenido Principal -->
        <main class="flex-1 p-6">
            <div class="max-w-full mx-auto">
                <div class="p-6">

                    <h3 class="text-xl font-semibold text-gray-700 dark:text-white">Bienvenido, {{ Auth::user()->name }} 👋</h3>
                    
                    <p class="text-gray-600 dark:text-white mt-2">Este es tu panel de control. Aquí puedes gestionar tus recursos, descargar recursos de otros usuarios, ver
                        mensajes y acceder a tu centro educativo.</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mt-6">

                        <a href="{{ route('recursos.index') }}"
                            class="bg-blue-100 p-4 rounded-lg shadow hover:bg-blue-200 transition">
                            <h4 class="text-lg font-semibold">📚 Ver mis recursos</h4>
                            <p class="text-sm text-gray-600">Explora y gestiona tus recursos educativos.</p>
                        </a>

                        <a href="{{ route('recursos.create') }}"
                            class="bg-green-100 p-4 rounded-lg shadow hover:bg-green-200 transition">
                            <h4 class="text-lg font-semibold">✏️ Crear Recurso</h4>
                            <p class="text-sm text-gray-600">Sube un nuevo recurso para compartir.</p>
                        </a>

                        <a href="{{ route('recursos.publico') }}"
                            class="bg-pink-200 p-4 rounded-lg shadow hover:bg-pink-400 transition">
                            <h4 class="text-lg font-semibold">✏️ Ver recursos públicos</h4>
                            <p class="text-sm text-gray-600">Ve recursos de otros usuarios.</p>
                        </a>

                        <a
                            class="bg-yellow-100 p-4 rounded-lg shadow hover:bg-yellow-200 transition">
                            <h4 class="text-lg font-semibold">🏫 Centro educativo</h4>
                            <p class="text-sm text-gray-600">Ve y edita tu centro.</p>
                        </a>

                        <a href="{{ route('calendario.index') }}"
                            class="bg-lime-200 p-4 rounded-lg shadow hover:bg-red-400 transition">
                            <h4 class="text-lg font-semibold">🗓️ Calendario</h4>
                            <p class="text-sm text-gray-600">Ve y edita tu centro.</p>
                        </a>

                        <a href="{{ route('recursos.favoritos') }}"
                            class="bg-purple-200 p-4 rounded-lg shadow hover:bg-purple-600 transition">
                            <h4 class="text-lg font-semibold">💖 Mis recursos favoritos</h4>
                            <p class="text-sm text-gray-600">Tus recursos favoritos</p>
                        </a>

                        <a href="{{ route('usuarios.index') }}"
                            class="bg-orange-200 p-4 rounded-lg shadow hover:bg-orange-600 transition">
                            <h4 class="text-lg font-semibold">👤 Buscar usuarios</h4>
                            <p class="text-sm text-gray-600">Busca recursos de otros usuarios</p>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
