@auth
<!-- Sidebar Navigation -->
<aside class="w-64 min-h-screen bg-white shadow-md">
    <div class="p-4 border-b">
        <h3 class="text-lg font-semibold text-gray-700">Navegación</h3>
    </div>

    <nav class="p-4 flex flex-col space-y-2">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block">
            📊 {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('recursos.index')" :active="request()->routeIs('recursos.index')" class="block">
            📚 {{ __('Ver mis recursos') }}
        </x-nav-link>

        {{--         <x-nav-link :href="route('mensajes.index')" :active="request()->routeIs('mensajes.index')" class="block">
            💬 {{ __('Mensajes') }}
        </x-nav-link>
        --}}
        <x-nav-link {{-- :href="route()" :active="request()->routeIs()" --}} class="block">
            🏫 {{ __('Mi centro educativo') }}
        </x-nav-link>

        <!-- Dropdown de Usuario -->
        <div class="mt-6 border-t pt-4">
            <div class="text-gray-700 font-semibold">{{ Auth::user()->name }}</div>
            <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>

            <x-nav-link :href="route('profile.edit')" class="block mt-2">
                ⚙️ {{ __('Editar Perfil') }}
            </x-nav-link>

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="block text-red-500">
                    🚪 {{ __('Cerrar Sesión') }}
                </x-nav-link>
            </form>
        </div>
    </nav>
</aside>
@endauth
