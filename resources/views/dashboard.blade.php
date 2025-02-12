<x-app-layout>


    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
       {{--  <aside class="w-64 bg-white shadow-md">
            <div class="p-4 border-b">
                <h3 class="text-lg font-semibold text-gray-700">Menú</h3>
            </div>
            <nav class="p-4 flex flex-col space-y-2">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block">
                    📊 {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('recursos.index')" :active="request()->routeIs('recursos.index')" class="block">
                    📚 {{ __('Ver Recursos') }}
                </x-nav-link>
                <x-nav-link :href="route('recursos.create')" :active="request()->routeIs('recursos.create')" class="block">
                    ✏️ {{ __('Crear Recurso') }}
                </x-nav-link>
            </nav>
        </aside> --}}


        <!-- Contenido Principal -->
        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-700">Bienvenido, {{ Auth::user()->name }} 👋</h3>
                    <p class="text-gray-600 mt-2">Este es tu panel de control. Aquí puedes gestionar tus recursos, ver
                        mensajes y acceder a tu centro educativo.</p>

                    <!-- Tarjetas de Acceso Rápido -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mt-6">
                        <a href="{{ route('recursos.index') }}"
                            class="bg-blue-100 p-4 rounded-lg shadow hover:bg-blue-200 transition">
                            <h4 class="text-lg font-semibold">📚 Ver Recursos</h4>
                            <p class="text-sm text-gray-600">Explora y gestiona tus recursos educativos.</p>
                        </a>

                        <a href="{{ route('recursos.create') }}"
                            class="bg-green-100 p-4 rounded-lg shadow hover:bg-green-200 transition">
                            <h4 class="text-lg font-semibold">✏️ Crear Recurso</h4>
                            <p class="text-sm text-gray-600">Sube un nuevo recurso para compartir.</p>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
