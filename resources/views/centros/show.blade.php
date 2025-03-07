<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <!-- Logo del Centro -->
        <div class="flex justify-center">
            <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold text-xl">
                {{ substr($centro->nombre, 0, 1) }} <!-- Primera letra del nombre -->
            </div>
        </div>

        <!-- Información del Centro -->
        <div class="mt-6 text-center">
            <h1 class="text-3xl font-bold text-gray-800">{{ $centro->nombre }}</h1>
            <p class="text-gray-600 mt-1">Responsable: <span class="font-semibold">{{ $centro->responsable }}</span></p>
        </div>

        <div class="mt-4 space-y-2">
            <p class="text-gray-700"><strong>📍 Dirección:</strong> {{ $centro->direccion }}</p>
            <p class="text-gray-700"><strong>📞 Teléfono:</strong> {{ $centro->telefono }}</p>
            <p class="text-gray-700"><strong>📧 Email:</strong> <a href="mailto:{{ $centro->email }}" class="text-blue-600 hover:underline">{{ $centro->email }}</a></p>
            <p class="text-gray-700"><strong>🌐 Web:</strong> <a href="{{ $centro->web }}" target="_blank" class="text-blue-600 hover:underline">{{ $centro->web }}</a></p>
        </div>

        <!-- Botón de Regreso -->
        <div class="mt-6 flex justify-center">
            <a href="{{ route('centros.index') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                🔙 Volver
            </a>
        </div>
    </div>
</x-app-layout>
