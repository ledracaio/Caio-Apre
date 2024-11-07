<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PessoaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/pessoas', [PessoaController::class, 'index'])->name('pessoas.index');
    Route::get('/pessoas/create', [PessoaController::class, 'create'])->name('pessoas.create');
    Route::post('/pessoas', [PessoaController::class, 'store'])->name('pessoas.store');
    Route::get('/pessoas/{pessoa}', [PessoaController::class, 'show'])->name('pessoas.show');
    Route::get('/pessoas/{pessoa}/edit', [PessoaController::class, 'edit'])->name('pessoas.edit');
    Route::put('/pessoas/{pessoa}', [PessoaController::class, 'update'])->name('pessoas.update');
    Route::delete('/pessoas/{pessoa}', [PessoaController::class, 'destroy'])->name('pessoas.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
