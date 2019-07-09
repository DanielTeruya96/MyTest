@extends('principal')

@section('titulo','Nova Prova')

@section('content')
    <h1>Nova Prova</h1>

    <form class="form-group" action="{{action("ProvaController@salvar")}}" method="POST">
        @include('logado.prova.formProva')
        <button type="submit"> salvar</button>
    </form>





@stop