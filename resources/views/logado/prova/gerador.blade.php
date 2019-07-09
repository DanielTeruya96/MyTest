@extends('principal')

@section('titulo', 'Gerador')

@section('content')

    <h1>Gerador de Prova</h1>
    <ul>
    @for($i = 1; $i<=$quantidade; $i++)
       <li>
        <a href="{{action('ProvaController@exibir',$i)}}">Prova {{$i}}</a>

       </li>
    @endfor
    </ul>

@stop