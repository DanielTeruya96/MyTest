<?php

namespace App\Http\Controllers;

use App\alternativa;
use App\Prova;
use App\Questao;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvaController extends Controller
{

    public function criar(){
        return view('logado.prova.novaProva');
    }

    public function salvar(){
        $qtd = $_POST['qtd'];
        $titulo = $_POST['titulo'];
        $tema = $_POST['tema'];
        $prova = new Prova();
        $prova->titulo = $titulo;
        $id = session('logged')->id;
        $user = User::find($id);
        $user->prova()->save($prova);

        for($i = 1; $i<=$qtd; $i++){

            $descricao = $_POST['questao'.$i];

            if(!empty($descricao)){
                $questao = new Questao();
                $questao->descricao = $descricao;

                $questao->tema = $tema;
                $prova->questao()->save($questao);
                $qtdAlt = $_POST['q'.$i.'qtdalt'];

                for($j = 1; $j<=$qtdAlt; $j++){
                    $desc = $_POST['q'.$i.'alternativa'.$j];
                    if(!empty($desc)){
                        $alternativa = new alternativa();

                        $alternativa->descricao = $desc;
                        if(isset($_POST['q'.$i.'alternativaBox'.$j])){
                            $alternativa->correta = true;
                        }
                        $questao->alternativa()->save($alternativa);
                    }

                }

            }

        }

        return redirect()->action("DashBoardController@home");

    }

    public function ver($id){
        $prova = Prova::find($id);


        return view('logado.prova.visualiza')->with('prova',$prova);
    }

    public function editar($id){
        $prova = Prova::find($id);
        $titulo = $_POST['titulo'];
        $prova->titulo = $titulo;
        $countq = 0;
        foreach ($prova->questao as $questao){
            $countq++;
            $questao->descricao = $_POST['questao'.$countq];
            $countA = 0;
            foreach ($questao->alternativa as $alternativa){
                $countA++;
                $alternativa->descricao = $_POST['q'.$countq.'alternativa'.$countA];
                if(isset($_POST['q'.$countq.'alternativaBox'.$countA])){
                    $alternativa->correta = true;
                }else{
                    $alternativa->correta = false;
                }
                $alternativa->save();
            }
            $questao->save();
        }
        $prova->save();


        return view('logado.prova.visualiza')->with('salvado', true)->with('prova',$prova);

    }

    public function gerar(){
        $id = $_POST['id'];
        $quantidade = (isset($_POST['qtd'])) ? $_POST['qtd'] : 1;
        if ($quantidade < 1){
            $quantidade = 1;
        }
        session(['prova' => $id]);

        return view('logado.prova.gerador')->with('id', $id)->with('quantidade', $quantidade);
    }


    public function exibir($seed){
        $id = session()->get('prova');
        $prova = Prova::find($id);
        $dadosExibir = array();
        $dadosExibir = ['titulo' => $prova->titulo];
        $repeteQ = $this->vetA(sizeof($prova->questao));

        $dadosExibir['Questao'] = array();
        while (!$this->acabou($repeteQ)){

            do{
                srand($seed);
                $indiceQ = $this->randomico(sizeof($prova->questao),$repeteQ,$seed);

            }while($repeteQ[$indiceQ]);
            $repeteQ[$indiceQ] = true;


            $descri = $prova->questao[$indiceQ]->descricao;
            $dadosExibir['Questao'][$descri] = array();


            $repeteA = $this->vetA(sizeof($prova->questao[$indiceQ]->alternativa));

            while(!$this->acabou($repeteA)){
                do{
                    srand($seed);
                    $indiceA = $this->randomico(sizeof($prova->questao[$indiceQ]->alternativa),$repeteA,$seed);
                }while($repeteA[$indiceA]);
                $repeteA[$indiceA] = true;
                $dadosExibir['Questao'][$descri][] = $prova->questao[$indiceQ]->alternativa[$indiceA]->descricao;

            }


        }







        return view('logado.prova.exibir')->with('prova', $prova)->with('dados',$dadosExibir)->with('titulo','Prova');
    }




    public function excluir(){
        $id = $_POST['provaId'];
        $prova = Prova::destroy($id);
        return redirect()->action("DashBoardController@home");
    }

    function acabou($array){
        $flag = true;
        foreach ($array as $item){
            if(!$item){
                $flag = false;
            }
        }
        return $flag;
    }


    function vetA($qtd){

        $vetA = array();
        for($i = 0; $i<$qtd;$i++){
            $vetA[$i] = false;
        }
        return $vetA;
    }

    function randomico($size, $repete, $seed){
        srand($seed);
        $indice = rand(0,$size) % $size;
        while($repete[$indice]){

            $indice = ($indice+1) % $size;
        }
        return $indice;

    }
}
