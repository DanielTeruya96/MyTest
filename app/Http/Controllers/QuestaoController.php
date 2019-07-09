<?php

namespace App\Http\Controllers;

use App\Questao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestaoController extends Controller
{

    public function questoes(){

        $temas = DB::table('questaos')->distinct('tema')->pluck('tema');
        $ret = array();
        foreach ($temas as $tema){
            $ret[$tema] = DB::table('questaos')->where('tema','=',$tema)->get();
        }




        return view('logado.questao.questoes')->with('temas',$ret);
    }

    public function ver($id){
            $questao = Questao::find($id);

            return view('logado.questao.questao')->with('questao',$questao);

    }
}
