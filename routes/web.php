<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GraficaDePaisesController;
use App\Http\Controllers\GraficaDeGenerosController;
use App\Http\Controllers\GraficaDePresetsController;
use App\Http\Controllers\GraficaNumeroDeUsuariosController;
use App\Http\Controllers\GraficaDeEdadesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/graficaNumeroDeUsuarios', function () {
    return view('graficaNumeroDeUsuarios');
})->middleware(['auth', 'verified'])->name('graficaNumeroDeUsuarios');

Route::get('/graficaDeGeneros', function () {
    return view('graficaDeGeneros');
})->middleware(['auth', 'verified'])->name('graficaDeGeneros');

Route::get('/graficaDePaises', function () {
    return view('graficaDePaises');
})->middleware(['auth', 'verified'])->name('graficaDePaises');

Route::get('/graficaDeEdades', function () {
    return view('graficaDeEdades');
})->middleware(['auth', 'verified'])->name('graficaDeEdades');

Route::get('/graficaDePresets', function () {
    return view('graficaDePresets');
})->middleware(['auth', 'verified'])->name('graficaDePresets');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/graficaDePaises', [GraficaDePaisesController::class, 'index'])->name('graficaDePaises');
Route::get('/graficaDeEdades', [GraficaDeEdadesController::class, 'index'])->name('graficaDeEdades');
Route::get('/graficaDeGeneros', [GraficaDeGenerosController::class, 'index'])->name('graficaDeGeneros');
Route::get('/graficaDePresets', [GraficaDePresetsController::class, 'index'])->name('graficaDePresets');
Route::get('/graficaNumeroDeUsuarios', [GraficaNumeroDeUsuariosController::class, 'index'])->name('graficaNumeroDeUsuarios');

require __DIR__.'/auth.php';
