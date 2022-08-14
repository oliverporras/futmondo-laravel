<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Clasificacion;
use App\Models\Palmares;
use App\Models\Noticia;
use App\Models\EquipoRanked;
use App\Models\ComparativaPuntos;

class EquipoController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        $equipos = Clasificacion::orderBy('Puesto', 'asc')->get();
        $teams = EquipoRanked::orderBy('Nombre', 'asc')
                    ->orderBy('Nombre', 'desc')
                    ->get();
        $coaches = Equipo::orderBy('Entrenador', 'asc')
                    ->orderBy('Entrenador', 'desc')
                    ->get();
        $noticias = Noticia::orderBy('Fecha', 'desc')
                            ->orderBy('Fecha', 'desc')
                            ->take(5)
                            ->get();
        
        return view('teamlist',[
            'equipos' => $equipos,
            'teams' => $teams,
            'coaches' => $coaches,
            'noticias' => $noticias
        ]);
    }

    public function indexCoaches(){
        $equipos = Clasificacion::orderBy('Puesto', 'asc')->get();
        $teams = EquipoRanked::orderBy('Nombre', 'asc')
                    ->orderBy('Nombre', 'desc')
                    ->get();
        $coaches = Equipo::orderBy('Entrenador', 'asc')
                    ->orderBy('Entrenador', 'desc')
                    ->get();
        $noticias = Noticia::orderBy('Fecha', 'desc')
                            ->orderBy('Fecha', 'desc')
                            ->take(5)
                            ->get();
        
        return view('coachlist',[
            'equipos' => $equipos,
            'teams' => $teams,
            'coaches' => $coaches,
            'noticias' => $noticias
        ]);
    }    

    public function verEquipo($id){
        $team = Equipo::find($id);
        $equipos = Clasificacion::orderBy('Puesto', 'asc')->get();
        $temporadaactual = Clasificacion::find($id);
        $teams = Equipo::orderBy('Nombre', 'asc')
                    ->orderBy('Nombre', 'desc')
                    ->get();
        $coaches = Equipo::orderBy('Entrenador', 'asc')
                    ->orderBy('Entrenador', 'desc')
                    ->get();
        $facts = Palmares::where('equipo', '=', $id)
                            ->orderBy('temporada','desc')
                            ->get();
        $desde = Palmares::where('equipo', '=', $id)
                            ->orderBy('temporada','asc')
                            ->take(1)
                            ->get();
        $noticias = Noticia::orderBy('Fecha', 'desc')
                            ->orderBy('Fecha', 'desc')
                            ->take(5)
                            ->get();
        $compPuntosLiga = ComparativaPuntos::where('Id', '=', $id)
                            ->where('ModoPuntuacion', '=', 'Liga')
                            ->orderBy('temporada','desc')
                            ->get();      
        $compPuntosClassic = ComparativaPuntos::where('Id', '=', $id)
                            ->where('ModoPuntuacion', '=', 'Clásico')
                            ->orderBy('temporada','desc')
                            ->get();      
        return view('teamdetail',[
            'equipos' => $equipos,
            'team' => $team,
            'current_season' => $temporadaactual,
            'team_facts' => $facts,
            'from' => $desde,
            'teams' => $teams,
            'coaches' => $coaches,
            'noticias' => $noticias,
            'compPuntosClassic' => $compPuntosClassic,
            'compPuntosLiga' => $compPuntosLiga
        ]);
    }

    public function verEntrenador($id){
        $team = Equipo::find($id);
        $equipos = Clasificacion::orderBy('Puesto', 'asc')->get();
        $temporadaactual = Clasificacion::find($id);
        $teams = Equipo::orderBy('Nombre', 'asc')
                    ->orderBy('Nombre', 'desc')
                    ->get();
        $coaches = Equipo::orderBy('Entrenador', 'asc')
                    ->orderBy('Entrenador', 'desc')
                    ->get();
        $facts = Palmares::where('equipo', '=', $id)
                            ->orderBy('temporada','desc')
                            ->get();
        $desde = Palmares::where('equipo', '=', $id)
                            ->orderBy('temporada','asc')
                            ->take(1)
                            ->get();
        $noticias = Noticia::orderBy('Fecha', 'desc')
                            ->orderBy('Fecha', 'desc')
                            ->take(5)
                            ->get();
        $compPuntosLiga = ComparativaPuntos::where('Id', '=', $id)
                            ->where('ModoPuntuacion', '=', 'Liga')
                            ->orderBy('temporada','desc')
                            ->get();      
        $compPuntosClassic = ComparativaPuntos::where('Id', '=', $id)
                            ->where('ModoPuntuacion', '=', 'Clásico')
                            ->orderBy('temporada','desc')
                            ->get();      
        return view('coachdetail',[
            'equipos' => $equipos,
            'team' => $team,
            'current_season' => $temporadaactual,
            'team_facts' => $facts,
            'from' => $desde,
            'teams' => $teams,
            'coaches' => $coaches,
            'noticias' => $noticias,
            'compPuntosClassic' => $compPuntosClassic,
            'compPuntosLiga' => $compPuntosLiga
        ]);
    }    
}
