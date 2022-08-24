<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikeNoticia;

class LikeController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function like($noticia_id){
        //Recoger datos del usuario
        $user = \Auth::user();

        //Condicion para evitar duplicados
        $isset_like = LikeNoticia::where('user_id', $user->id)
                        ->where('noticia_id', $noticia_id)
                        ->count();
        if( $isset_like == 0){
            $like = new LikeNoticia();
            $like->user_id = $user->id;
            $like->noticia_id = (int)$noticia_id;

            //guardar en la bd
            $like->save();

            //devolver un JSON
            return response()->json([
                'like' => $like
            ]);
        }
        else{
            return response()->json([
                'message' => 'Like duplicado'
            ]);
        }
    }    

    public function dislike($noticia_id){
        //Recoger datos del usuario
        $user = \Auth::user();

        //Condicion para evitar duplicados
        $like = LikeNoticia::where('user_id', $user->id)
                        ->where('noticia_id', $noticia_id)
                        ->first();
        if( $like ){
            //guardar en la bd
            $like->delete();

            //devolver un JSON
            return response()->json([
                'like' => $like,
                'message' => 'Like eliminado'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Like no existe'
            ]);
        }
    }

}
