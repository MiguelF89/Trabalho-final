<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas do CRUD de Instituições
Route::prefix('instituicoes')->group(function () {
    Route::get('/', [InstituicaoController::class, 'index'])->name('instituicoes.index');
    Route::get('/create', [InstituicaoController::class, 'create'])->name('instituicoes.create');
    Route::post('/store', [InstituicaoController::class, 'store'])->name('instituicoes.store');
    Route::get('/{instituicao}/edit', [InstituicaoController::class, 'edit'])->name('instituicoes.edit');
    Route::put('/{instituicao}', [InstituicaoController::class, 'update'])->name('instituicoes.update');
    Route::delete('/{instituicao}', [InstituicaoController::class, 'destroy'])->name('instituicoes.destroy');
});
