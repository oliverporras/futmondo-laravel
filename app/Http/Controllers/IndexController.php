<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clasificacion;
use App\Models\Temporadas;
use App\Models\Equipo;
use App\Models\Noticia;
use App\Models\EquipoRanked;
use App\Models\HallOfFame;

class IndexController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }

    public function index(){
        //$equipos = Clasificacion::orderBy('id', 'desc');
        //$equipos = Clasificacion::all();
        $equipos = Clasificacion::orderBy('Puesto', 'asc')->get();
        $teams = Equipo::orderBy('Nombre', 'asc')
                    ->orderBy('Nombre', 'desc')
                    ->get();
        $coaches = Equipo::orderBy('Entrenador', 'asc')
                    ->orderBy('Entrenador', 'desc')
                    ->get();
        $noticias = Noticia::orderBy('Fecha', 'desc')
                    ->paginate(3);
        $lideres = EquipoRanked::orderBy('Ptos', 'desc')
                    ->take(4)
                    ->get();
        $halloffame = HallOfFame::all();
        return view('index',[
            'noticias' => $noticias,
            'equipos' => $equipos,
            'teams' => $teams,
            'coaches' => $coaches,
            'lideres' => $lideres,
            'halloffame' => $halloffame
        ]);
    }
}
