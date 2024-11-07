<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PessoaController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pessoas', [PessoaController::class, 'index']);
    Route::post('/pessoas', [PessoaController::class, 'store']);
    Route::get('/pessoas/{id}', [PessoaController::class, 'show']);
    Route::put('/pessoas/{id}', [PessoaController::class, 'update']);
    Route::delete('/pessoas/{id}', [PessoaController::class, 'destroy']);
});
?>