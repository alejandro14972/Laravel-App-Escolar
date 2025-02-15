<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecursoController;
use App\Models\Recurso;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//recursos accesos privados
Route::get('/recursos', [RecursoController::class, 'index'])->middleware(['auth', 'verified'])->name('recursos.index');
Route::get('/recurso-create', [RecursoController::class, 'create'])->middleware(['auth', 'verified'])->name('recursos.create');
Route::get('/recurso/{recurso}/edit', [RecursoController::class, 'edit'])->middleware(['auth', 'verified'])->name('recursos.edit');
Route::get('/recurso/{recurso}', [RecursoController::class, 'show'])->name('recursos.show');

//recursos accesos publicos
Route::get('/recursos/public/categorias', function () {
    return view('recursos.public');
})->name('recursos.publico');

Route::get('/recursos/public/categoria/{id_categoria}', function ($id) {
    return view('recursos.publicoRecursosByCategorias', ['id_tematica' => $id]);
})->name('recursos.publico.categoria');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
