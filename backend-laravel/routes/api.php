<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;

// Rota de teste para garantir que o arquivo está sendo lido
Route::get('teste', function() {
    return 'API funcionando!';
});

// CRUD de Instituições
Route::apiResource('instituicoes', InstituicaoController::class);
