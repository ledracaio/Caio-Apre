<?php

use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('pessoas', PessoaController::class);
});
