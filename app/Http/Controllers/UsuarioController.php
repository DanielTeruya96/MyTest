<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\View\View;

class UsuarioController extends Controller
{
    public function login(){

        return view('usuario.usuario');
    }

    public function cadastrar(){
        return view('usuario.usuario_cadastrar');
    }

    public function salvar(){
        $nome = Request::input('nome');
        $senha = Request::input('senha');
        $email = Request::input('email');
        $area = Request::input('area');

        $user = new User();
        $user->name = $nome;
        $user->password = md5($senha);
        $user->email = $email;
        $user->area = $area;
        $user->save();

        return view('bemVindo')->with("cadastrado","cadastrado");

    }

    public function singup(){
        $senha = Request::input('senha');
        $email = Request::input('email');
        $senha = md5($senha);

        //TODO Melhorar a autenticação
        $user = DB::SELECT('SELECT * FROM users where  email = "'.$email.'"');

        if($senha == $user[0]->password){
            session(['logged' => $user[0]]);
            return redirect()->action("DashBoardController@home");
        }else{


            return view('usuario.usuario')->with('erro','Senha Incorreta');
        }

    }
    public function logout(){
        session()->forget('logged');
        return view('bemVindo');

    }
}
