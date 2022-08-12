<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\VisitaController::class, 'index'])->name('visita.index');

Auth::routes();
Route::resource('albums', App\Http\Controllers\AlbumController::class)->middleware('auth');
Route::resource('canciones', App\Http\Controllers\CancioneController::class)->middleware('auth');
Route::resource('generos', App\Http\Controllers\GeneroController::class)->middleware('auth');
Route::resource('artistas', App\Http\Controllers\ArtistaController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\CancioneController::class, 'index'])->name('home')->middleware('auth');

Route::get('/search', [App\Http\Controllers\VisitaController::class, 'search'])->name('visita.search');

/* Route::post('/visita', function(){
    return view ('visita.busqueda');
}); */

Route::post('/visita/busqueda',  [App\Http\Controllers\VisitaController::class, 'busqueda'])->name('visita.busqueda');

