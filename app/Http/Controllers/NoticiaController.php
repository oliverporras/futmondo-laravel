<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Equipo;
use App\Models\Clasificacion;

class NoticiaController extends Controller
{
    //
    public function index()
    {
        $equipos = Clasificacion::orderBy('Puesto', 'asc')->get();
        $teams = Equipo::orderBy('Nombre', 'asc')
                    ->orderBy('Nombre', 'desc')
                    ->get();
        $coaches = Equipo::orderBy('Entrenador', 'asc')
                    ->orderBy('Entrenador', 'desc')
                    ->get();
        $noticias = Noticia::orderBy('Fecha', 'desc')
                    ->paginate(5);
        return view('news',[
            'noticias' => $noticias,
            'equipos' => $equipos,
            'teams' => $teams,
            'coaches' => $coaches
        ]);
    }


    public function detail( $id ){
        $equipos = Clasificacion::orderBy('Puesto', 'asc')->get();
        $teams = Equipo::orderBy('Nombre', 'asc')
                    ->orderBy('Nombre', 'desc')
                    ->get();
        $coaches = Equipo::orderBy('Entrenador', 'asc')
                    ->orderBy('Entrenador', 'desc')
                    ->get();
        $noticia = Noticia::find($id);
        return view('new', [
            'noticia' => $noticia,
            'equipos' => $equipos,
            'teams' => $teams,
            'coaches' => $coaches
        ]);
    }
}
