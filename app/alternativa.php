<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alternativa extends Model
{
    //

    public function questao(){
        return $this->belongsTo('App\Questao','id_questao');
    }
}
