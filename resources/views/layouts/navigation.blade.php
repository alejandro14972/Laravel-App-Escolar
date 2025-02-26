<!-- Sidebar -->
<div x-data="{ open: window.innerWidth >= 768 }" class="relative">
    <!-- Botón para abrir el menú -->
    <button @click="open = !open" class="absolute top-4 left-4 z-50 p-2 bg-gray-800 text-white rounded-md md:hidden">
        ☰
    </button>

    <!-- Menú lateral -->
    <nav :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed left-0 top-0 h-full w-64 bg-white shadow-md transition-transform duration-100 ease-linear md:translate-x-0">

        <div class="p-4 flex justify-between items-center border-b">
            <span class="text-lg font-semibold">Menú</span>
            <button @click="open = false" class="text-gray-600 hover:text-gray-800 md:hidden">&times;</button>
        </div>

        <ul class="p-4 space-y-2">
            <li>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200">
                    📊 {{ __('Dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('recursos.index') }}"
                    class="block px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200">
                    📚 {{ __('Ver mis recursos') }}
                </a>
            </li>
            <li>
                <a {{-- href="{{ route('centro.educativo') }} --}}" class="block px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200">
                    🏫 {{ __('Mi centro educativo') }}
                </a>
            </li>
            <li>
                <a href="{{ route('calendario.index') }}"
                    class="block px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200">
                    🗓️ {{ __('Mis eventos') }}
                </a>
            </li>
            <li>
                <a href="{{ route('usuarios.index') }}"
                    class="block px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200">
                    👥 {{ __('Usuarios') }}
                </a>
            </li>
            <li>
                <a {{-- href="{{ route('foro.index') }} --}}" class="block px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200">
                    💬 {{ __('Foro') }}
                </a>
            </li>
            <li>
                <a {{-- href="{{ route('notificaciones.index') }} --}}" class="block px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200">
                    🔔 {{ __('Notificaciones') }}
                </a>
            </li>
            <div class="border-t">
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="block px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200">
                        ✏️ {{ __('Editar usuario') }}
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200">
                            🚪 {{ __('Cerrar sesión') }}
                        </button>
                    </form>
                </li>
            </div>
        </ul>
    </nav>
</div>