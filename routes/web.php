<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestApiController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\CocheController;

Route::get('/', function () {
    return view('index');
})->name('index')->middleware(['auth:sanctum', 'verified']);

/* REGION REST */

    Route::get('rest', [RestApiController::class, 'index'])->name('rest.index');
    Route::get('rest/{dispositivo}', [RestApiController::class, 'carrera'])->name('rest.carrera');
    Route::post('rest/{dispositivo}/insertarTiempo', [RestApiController::class, 'insertarTiempo'])->name('rest.insertarTiempo');
    Route::post('rest/participacion', [RestApiController::class, 'getParticipacion'])->name('rest.getParticipacion');


Route::middleware(['auth:sanctum', 'verified'])->get('/datos', function () {
    return view('laptimer.dashboard');
})->name('laptimer.dashboard');
/* ENDREGION REST */

/* Parte de las carreras */
Route::controller(CarreraController::class)->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('carreras', 'index')->name('carreras.index');
    Route::get('carreras/create', 'create')->name('carreras.create');
    Route::post('carreras/store', 'store')->name('carreras.store');
    Route::get('carreras/{carrera}', 'show')->name('carreras.show');
    Route::get('carreras/{carrera}/edit', 'edit')->name('carreras.edit');
    Route::put('carreras/{carrera}', 'update')->name('carreras.update');
    Route::delete('carreras/{carrera}/delete', 'destroy')->name('carreras.destroy');
});

/* Parte de los jugadores */
Route::controller(JugadorController::class)->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('jugadores', 'index')->name('jugadores.index');
    Route::get('jugadores/create', 'create')->name('jugadores.create');
    Route::post('jugadores/store', 'store')->name('jugadores.store');
    Route::get('jugadores/{jugador}', 'show')->name('jugadores.show');
    Route::get('jugadores/{jugador}/edit', 'edit')->name('jugadores.edit');
    Route::put('jugadores/{jugador}', 'update')->name('jugadores.update');
    Route::delete('jugadores/{jugador}/delete', 'destroy')->name('jugadores.destroy');
});

/* Parte de los coches */
Route::controller(CocheController::class)->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('coches', 'index')->name('coches.index');
    Route::get('coches/create', 'create')->name('coches.create');
    Route::post('coches/store', 'store')->name('coches.store');
    Route::get('coches/{coche}', 'show')->name('coches.show');
    Route::get('coches/{coche}/edit', 'edit')->name('coches.edit');
    Route::put('coches/{coche}', 'update')->name('coches.update');
    Route::delete('coches/{coche}/delete', 'destroy')->name('coches.destroy');
});

/* Parte de los campeonatos */
// Route::resource('campeonatos', CampeonatoController::class)->middleware(['auth:sanctum', 'verified']);

/* Parte de los equipos */
// Route::resource('equipos', EquipoController::class)->middleware(['auth:sanctum', 'verified']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');