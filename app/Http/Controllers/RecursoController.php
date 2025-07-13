<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('recursos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Recurso $recurso)
    {
        $user = auth()->user();
        //dd($recurso->comentarios->first()->user->name);
        //dd($recurso->likes->first()->user->name);
        return view('recursos.show', [
            'recurso' => $recurso,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recurso $recurso)
    {
        if (Gate::allows('update', $recurso)) {
            return view('recursos.edit', [
                'recurso' => $recurso
            ]);
        } else {
            session()->flash('mensajeError', 'No tiene acceso a editar este recurso');
            return redirect()->route('recursos.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function misRecursosFavoritos()
    {
        $user = auth()->user();

        /* Explicación de la consulta:
                    🔹 $user->likes()
                    Obtiene todos los registros de "likes" del usuario. Es una relación hasMany, así que devuelve un HasMany de objetos Like.

                    🔹 ->with('recurso')
                    Le dice a Eloquent que, al obtener los "likes", cargue también el recurso relacionado con cada like (para evitar consultas adicionales por cada recurso).

                    Esto es eager loading, y optimiza rendimiento.

                    🔹 ->get()
                    Ejecuta la consulta y devuelve una colección de objetos Like con su recurso cargado.

                    Ejemplo del resultado:
                    [
                        Like { 
                            id: 1, 
                            user_id: 1, 
                            recurso_id: 2, 
                            recurso: Recurso { id: 2, name: 'Recurso A' } 
                        },
                        Like { 
                            id: 2, 
                            user_id: 1, 
                            recurso_id: 3, 
                            recurso: Recurso { id: 3, name: 'Recurso B' } 
                        }
                    ]

                    📝 Tip adicional
Si quieres ordenar los recursos por fecha de like (por ejemplo, los más recientes primero), puedes hacer:
        $user->likes()->with('recurso')->orderBy('created_at', 'desc')->get();
*/
        $recursos = $user->likes()->with('recurso')->get()->pluck('recurso');
        //dd($recursos);
        return view('recursos.favoritos', [
            'recursos' => $recursos
        ]);
    }
}
