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

Route::get('/recursos', [RecursoController::class, 'index'])->middleware(['auth', 'verified'])->name('recursos.index');
Route::get('/recurso-create', [RecursoController::class, 'create'])->middleware(['auth', 'verified'])->name('recursos.create');
Route::get('/recurso/{recurso}/edit', [RecursoController::class, 'edit'])->middleware(['auth', 'verified'])->name('recursos.edit');
Route::get('/recurso/{recurso}', [RecursoController::class, 'show'])->middleware(['auth', 'verified'])->name('recursos.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
