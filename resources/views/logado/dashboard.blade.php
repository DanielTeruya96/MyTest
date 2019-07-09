@extends('principal')

@section('titulo', 'DashBoard')

@section('content')

    <h1>Seja Bem vindo {{session('logged')->name}} </h1>

    <h2>Suas provas</h2>
    <table>
        <tr>
            <th>Titulo da Prova</th>
            <th>ver</th>

        </tr>

    @foreach($user->Prova as $prova)
        <tr>

            <th>{{$prova->titulo}}</th>
            <th><a href="{{action('ProvaController@ver',$prova->id)}}">ver</a></th>
        </tr>
    @endforeach
    </table>



@stop