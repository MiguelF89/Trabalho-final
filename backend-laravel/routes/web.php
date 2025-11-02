<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DashboardController;

// Rota Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Rotas de autenticação (login, register, etc.)
require __DIR__.'/auth.php';

// Rotas protegidas (apenas usuários autenticados)
Route::middleware(['auth'])->group(function () {

    // Rotas Instituições
    Route::get('instituicoes', [InstituicaoController::class, 'index'])->name('instituicoes.index');
    Route::get('instituicoes/create', [InstituicaoController::class, 'create'])->name('instituicoes.create');
    Route::post('instituicoes', [InstituicaoController::class, 'store'])->name('instituicoes.store');
    Route::get('instituicoes/{id}/edit', [InstituicaoController::class, 'edit'])->name('instituicoes.edit');
    Route::put('instituicoes/{id}', [InstituicaoController::class, 'update'])->name('instituicoes.update');
    Route::delete('instituicoes/{id}', [InstituicaoController::class, 'destroy'])->name('instituicoes.destroy');

    // Rotas Produtos
    Route::get('produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

    // Rotas Vendas
    Route::get('vendas', [VendaController::class, 'index'])->name('vendas.index');
    Route::get('vendas/create', [VendaController::class, 'create'])->name('vendas.create');
    Route::post('vendas', [VendaController::class, 'store'])->name('vendas.store');
    Route::get('vendas/{id}/edit', [VendaController::class, 'edit'])->name('vendas.edit');
    Route::put('vendas/{id}', [VendaController::class, 'update'])->name('vendas.update');
    Route::delete('vendas/{id}', [VendaController::class, 'destroy'])->name('vendas.destroy');
});
