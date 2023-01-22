<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
use App\Models\Noticia;

/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::get('/homes', function () {
    $teams = Equipo::orderBy('Nombre', 'asc')
        ->orderBy('Nombre', 'desc')
        ->get();
    $heads = Equipo::orderBy('Entrenador', 'asc')
        ->orderBy('Entrenador', 'desc')
        ->get();    
    return view('home',[
        'teams' => $teams,
        'coaches' => $coach,
    ]);
});
*/


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
Route::post('/comment/save', [App\Http\Controllers\ComentarioController::class, 'save'])->name('comment.save');
Route::get('/like/{noticia_id}', [App\Http\Controllers\LikeController::class, 'like'])->name('like.save');
Route::get('/dislike/{noticia_id}', [App\Http\Controllers\LikeController::class, 'dislike'])->name('like.delete');
//Route::get('/noticias/editar/{id}', [App\Http\Controllers\NoticiaController::class, 'edit'])->name('newedit');
Route::get('/noticias/editar/{id}', function ( $id ) {
    if (Auth::check()) {
        $equipos = Clasificacion::orderBy('Puesto', 'asc')->get();
        $teams = Equipo::orderBy('Nombre', 'asc')
                    ->orderBy('Nombre', 'desc')
                    ->get();
        $coaches = Equipo::orderBy('Entrenador', 'asc')
                    ->orderBy('Entrenador', 'desc')
                    ->get();
        $noticia = Noticia::find($id);
        return view('newedit', [
            'noticia' => $noticia,
            'equipos' => $equipos,
            'teams' => $teams,
            'coaches' => $coaches
        ]);
    }
    else {
        return redirect()->route('login');
    }

});
Route::post('/new/save', [App\Http\Controllers\NoticiaController::class, 'save'])->name('new.save');
