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
use App\Models\Equipo;
use App\Models\Clasificacion;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $teams = Equipo::orderBy('Nombre', 'asc')
        ->orderBy('Nombre', 'desc')
        ->get();
    $heads = Equipo::orderBy('Entrenador', 'asc')
        ->orderBy('Entrenador', 'desc')
        ->get();    
    return view('home',[
        'teams' => $teams,
        'coaches' => $coach
    ]);
});




Auth::routes();

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/equipos', [App\Http\Controllers\EquipoController::class, 'index'])->name('teams.list');
Route::get('/equipo/{id}', [App\Http\Controllers\EquipoController::class, 'verEquipo'])->name('team.detail');
Route::get('/entrenadores', [App\Http\Controllers\EquipoController::class, 'indexCoaches'])->name('coach.list');
Route::get('/entrenador/{id}', [App\Http\Controllers\EquipoController::class, 'verEntrenador'])->name('coach.detail');
Route::get('/noticias', [App\Http\Controllers\NoticiaController::class, 'index'])->name('news');
Route::get('/noticias/{id}', [App\Http\Controllers\NoticiaController::class, 'detail'])->name('new.detail');
Route::get('/temporada/{id}', [App\Http\Controllers\HomeController::class, 'verTemporada'])->name('temporada');
