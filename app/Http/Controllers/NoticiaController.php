<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Equipo;
use App\Models\Clasificacion;
use Illuminate\Support\Facades\Auth;

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

    public function save( Request $request ){

        /*
        $validate = $this->validate($request, [
            'titulo' => 'required|string|max:50',
            'wysiwyg-editor' => 'required'
        ]);
        */

        //Recoger los datos del formulario
        $id = $request->input('noticia_id');
        $titulo = $request->input('titulo');
        $userid = Auth::user()->id;
        $body = $request->input('wysiwyg-editor');

        $noticia = Noticia::find($id);

        //Asignar nuevos valores al objeto Noticia
        $noticia = Noticia::find($id);
        $noticia->titulo = $titulo;
        $noticia->cuerpo = $body;
        
        //Ejeucutamos el update;
        $noticia->update();

        //Redireccionamos a la noticia
        return redirect()->route('new.detail', ['id' => $id]);

    }
}
