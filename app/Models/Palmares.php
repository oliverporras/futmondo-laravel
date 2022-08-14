<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palmares extends Model
{
    use HasFactory;
    protected $table = 'tblpalmares';

    //Relacion 1:N
    /*
    public function titulos(){
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