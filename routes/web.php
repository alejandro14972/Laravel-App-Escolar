<?php

use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecursoController;
use App\Models\Recurso;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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


//calendario privado
Route::get('/calendario', [CalendarioController::class, 'index'])->middleware(['auth', 'verified'])->name('calendario.index');
Route::post('/calendario/store', [CalendarioController::class, 'store'])->name('calendario.store');
Route::put('/calendario/update', [CalendarioController::class, 'update'])->name('calendario.update');


//likes recursos
Route::post('/recursos/{recurso}/likes', [LikeController::class, 'store'])->name('recursos.likes.store');
Route::delete('/recursos/{recurso}/likes', [LikeController::class, 'destroy'])->name('recursos.likes.destroy');

//comentarios recursos
Route::post('/{user}/recursos/{recurso}', [ComentarioController::class, 'store'])
    ->name('comentarios.store')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
