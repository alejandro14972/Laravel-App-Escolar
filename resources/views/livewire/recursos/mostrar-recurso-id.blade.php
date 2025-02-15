<div
    class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden border-2 border-purple-200 dark:border-purple-800">

    <div class="px-6 py-4 bg-gradient-to-r from-purple-600 to-pink-600">
        <h2 class="text-xl font-semibold text-white">{{ $recurso->recurso_nombre }}</h2>
    </div>


    <div class="p-6">
        <!-- Descripción -->
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            <span class="font-medium text-purple-600 dark:text-purple-400">Descripción:</span>
            <span class="text-gray-900 dark:text-gray-100">{{ $recurso->recurso_descripcion }}</span>
        </p>

        <!-- Temática -->
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            <span class="font-medium text-teal-600 dark:text-teal-400">Temática:</span>
            <span class="text-gray-900 dark:text-gray-100">{{ $recurso->tematica->tematica_nombre }}</span>
        </p>

        <!-- Usuario -->
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            <span class="font-medium text-pink-600 dark:text-pink-400">Creado por:</span>
            <span class="text-gray-900 dark:text-gray-100">{{ $recurso->user->name }}</span>
        </p>

        <!-- Fecha de actualización -->
        <p class="text-gray-700 dark:text-gray-300">
            <span class="font-medium text-yellow-600 dark:text-yellow-400">Última actualización:</span>
            <span class="text-gray-900 dark:text-gray-100">{{ $recurso->updated_at->format('d/m/Y H:i') }}</span>
        </p>

        <!-- Adjunto -->
        @if ($recurso->adjunto)
            @php
                // Convertimos el JSON de adjuntos en un array
                $adjuntos = json_decode($recurso->adjunto, true);
            @endphp
            <span class="font-medium text-indigo-600 dark:text-indigo-400">Archivo adjunto:</span>
            @foreach ($adjuntos as $adjunto)
                <div class="mt-4">

                    <div class="mt-2">
                        @php
                            $ext = pathinfo($adjunto, PATHINFO_EXTENSION);
                        @endphp

                        <!-- Si es una imagen -->
                        @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ asset('storage/recursos/' . $adjunto) }}" alt="Adjunto"
                                class="w-full h-auto rounded-lg shadow-md">

                            <!-- Si es un PDF -->
                        @elseif ($ext === 'pdf')
                            <iframe src="{{ asset('storage/recursos/' . $adjunto) }}"
                                class="w-2/4 min-h-96 border rounded-lg"></iframe>

                            <!-- Si es un documento descargable -->
                        @else
                            <a href="{{ asset('storage/recursos/' . $adjunto) }}" class="text-blue-500 hover:underline"
                                download>
                                Descargar archivo ({{ strtoupper($ext) }})
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif

    </div>

    <!-- Pie de la tarjeta -->
    <div class="px-6 py-4 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900 dark:to-pink-900">
        <p class="text-sm text-purple-600 dark:text-purple-300">Recurso educativo</p>
    </div>
</div>
