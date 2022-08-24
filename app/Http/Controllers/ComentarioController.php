<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComentarioNoticia;

class ComentarioController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request){
        //Validacion
        $validate = $this->validate($request,[
            'noticia_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        $content = $request->input('content');
        $noticia_id = $request->input('noticia_id');
        $user = \Auth::user();

        $comentario = new ComentarioNoticia();
        $comentario->user_id = $user->id;
        $comentario->noticia_id = $noticia_id;
        $comentario->comentario = $content;

        //guardar en la bd
        $comentario->save();

        //redireccion
        return redirect()->route('new.detail', ['id' => $noticia_id])
                        ->with([
                            'message' => 'Comentario publicado correctamente'
                        ]);
    }
}
