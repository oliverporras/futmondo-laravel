<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $table = 'tblnoticias';

    //Relacion 1:N
    public function comments(){
        return $this->hasMany('App\Models\ComentarioNoticia');
    }

    //Relacion 1:N
    public function likes(){
        return $this->hasMany('App\Models\LikeNoticia');
    }

    //Relacion N:1
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
