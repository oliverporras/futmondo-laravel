<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    use HasFactory;
    protected $table = 'vwclasificacionpuesto22';
    //protected $table = 'tblequipos22';
    

    //Relacion 1:N
    /*
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    */ 

    //Relacion N:1
    /*
    public function jugadores(){
        return $this->belongsTo('App\Models\Jugador', 'jugador_id');
    }
    */ 

}
