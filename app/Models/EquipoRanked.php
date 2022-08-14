<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoRanked extends Model
{
    use HasFactory;
    protected $table = 'vwequiposranked22';

    public function getRanking(){
        $collection = collect(EquipoRanked::orderBy('Ptos', 'DESC')->get());
        $data       = $collection->where('id', $this->id);
        $value      = $data->keys()->first() + 1;
        return $value;
    }   
}

