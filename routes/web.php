<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::middleware(['auth'])->group(function () {
    Route::resource('categorias', CategoriaController::class)->except('show');
});
