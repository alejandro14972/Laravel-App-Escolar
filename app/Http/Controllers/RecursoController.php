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
}
