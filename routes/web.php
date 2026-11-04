<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DesenvolvedoraController;
use App\Http\Controllers\JogoController;
use App\Http\Controllers\PlataformaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::resource('categorias', CategoriasController::class);
    Route::resource('plataformas', PlataformaController::class);
    Route::resource('desenvolvedoras', DesenvolvedoraController::class);
    Route::resource('jogos', JogoController::class);
});

require __DIR__.'/settings.php';
