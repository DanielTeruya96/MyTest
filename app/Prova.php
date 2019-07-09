<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{

    //


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function questao(){
        return $this->belongsToMany('App\Questao');
    }
}
