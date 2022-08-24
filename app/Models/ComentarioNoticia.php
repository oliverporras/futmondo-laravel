<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioNoticia extends Model
{
    use HasFactory;
    protected $table = 'tblnoticiacomentarios';

    //Relacion N:1
    public function noticia(){
        return $this->belongsTo('App\Models\Noticia', 'noticia_id');
    }
    
    //Relacion N:1
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
