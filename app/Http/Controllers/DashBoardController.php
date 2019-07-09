<?php

namespace App\Http\Controllers;

use App\Prova;
use App\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function home(){
        $user = session('logged');
        $user = User::find($user->id);


        return view('logado.dashboard')->with('user',$user);
    }
}
