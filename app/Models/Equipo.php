<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'tblequipos23';

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
