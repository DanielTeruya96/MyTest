<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{

    public function prova(){
        return $this->belongsToMany('App\Prova');
    }

    public function alternativa(){
        return $this->hasMany('App\alternativa','id_questao','id');
    }
}
