<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('instituicoes', InstituicaoController::class);
    Route::resource('produtos', ProdutoController::class);
    Route::resource('vendas', VendaController::class);
});
