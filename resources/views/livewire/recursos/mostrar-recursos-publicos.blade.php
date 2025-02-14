<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
    @foreach ($tematicas as $tematica)
        <a href="{{ route('recursos.publico.categoria', $tematica->id) }}" >
            <div class="bg-yellow-100 hover:bg-yellow-500 p-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <h4 class="text-lg font-semibold text-gray-800 text-center">{{ $tematica->tematica_nombre }} ({{ $tematica->recursos_count }})</h4>
            </div>
        </a>
    @endforeach
</div>
