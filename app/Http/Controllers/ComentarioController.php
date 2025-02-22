<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Recurso;
use App\Models\User;
use Illuminate\Http\Request;


class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user, Recurso $recurso)
    {
        // Validar el comentario
        $validatedData = $request->validate([
            'comentario' => 'required|max:255',
        ]);

        // Crear el comentario
        Comentario::create([
            'user_id' => $user->id, // Usar el ID del usuario recibido
            'recurso_id' => $recurso->id, // Usar el ID del recurso recibido
            'comentario' => $validatedData['comentario'],
        ]);

        // Redirigir de vuelta con un mensaje de éxito
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
