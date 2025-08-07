<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

// rota base -> redireciona para /login
Route::get('/', function () {
    return redirect()->route('login');
});

// rotas de autenticação
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // GET /login
Route::post('/login', [LoginController::class, 'login']);                      // POST /login
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// rotas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard.index'))->name('dashboard');
    Route::resource('categorias', CategoriaController::class)->except('show');
    Route::resource('produtos', ProdutoController::class)->except('show');
});
