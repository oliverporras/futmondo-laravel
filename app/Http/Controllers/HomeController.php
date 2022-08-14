<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clasificacion;
use App\Models\Temporadas;
use App\Models\Equipo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$equipos = Clasificacion::orderBy('id', 'desc');
        //$equipos = Clasificacion::all();
        $equipos = Clasificacion::orderBy('Puesto', 'asc')->get();
        $teams = Equipo::orderBy('Nombre', 'asc')
                    ->orderBy('Nombre', 'desc')
                    ->get();
        $coaches = Equipo::orderBy('Entrenador', 'asc')
                    ->orderBy('Entrenador', 'desc')
                    ->get();
        return view('home',[
            'equipos' => $equipos,
            'teams' => $teams,
            'coaches' => $coaches
        ]);
    }


    public function verTemporada( $id ){
        $temporada = substr($id,-2);
        $equipos = Temporadas::where('Temporada', '=', $id)
            ->orderBy('rn', 'asc')->get();
        $teams = Equipo::orderBy('Nombre', 'asc')
                    ->orderBy('Nombre', 'desc')
                    ->get();
        $coaches = Equipo::orderBy('Entrenador', 'asc')
                    ->orderBy('Entrenador', 'desc')
                    ->get();
        return view('season', [
            'id' => $id,
            'equipos' => $equipos,
            'teams' => $teams,
            'coaches' => $coaches,
            'temporada' => $temporada
        ]);
    }    
}
