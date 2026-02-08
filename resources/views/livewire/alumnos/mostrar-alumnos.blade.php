<div class="space-y-4 w-full">

    <div class="flex justify-self-end mb-6">
        <form method="GET" class="flex items-center space-x-2 p-3 ">
            <input type="search" name="search" placeholder="🔍 Buscar alumno..."
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                value="{{ request()->get('search') }}" />
            <button type="submit"
                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200 shadow-md">
                Buscar
            </button>
        </form>
    </div>


    @if ($alumnos->isEmpty())
        <div class="text-center p-4 bg-gray-100 rounded-lg shadow-md">
            <p class="text-gray-600">No hay alumnos registrados.</p>
        </div>
    @else

    @foreach ($alumnos as $alumno)
        <div class="flex items-center justify-between p-4 border-b border-gray-200 last:border-b-0">
            
            <div class="flex items-center">
                
                <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold text-xl">
                    {{ substr($alumno->nombre, 0, 1) }} <!-- Primera letra del nombre -->
                </div>

                <div class="ml-4">
                    <h4 class="text-lg font-semibold text-gray-200">{{$alumno->nombre}}</h4>
                    <p>{{$alumno->email}}</p>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{-- {{ route('alumno.show', $alumno->id) }} --}}" 
                    class=" text-gray-800 px-4 py-2 rounded-lg bg-green-400 shadow-md">
                    Ver
                </a>
            </div>

        </div>
    @endforeach
    @endif

    
</div>
