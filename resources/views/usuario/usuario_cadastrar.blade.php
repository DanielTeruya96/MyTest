@extends('principal')

@section('titulo', "Cadastrar")

@section('content')
    @include('topo')
    <div class="container-fluid">
        <h1>Cadastrar</h1>
        <div class="container-fluid">
        <form class="form-group" action="{{action("UsuarioController@salvar")}}" method="POST">
            <input type="hidden" name="_token" value="{{{csrf_token()}}}">
            <div class="row">
                <label>Nome</label>
                <input type="text" name="nome" class="form-group">
            </div>
            <div class="row">
            <label>Email</label>
            <input type="email" name="email" class="form-group">
            </div>
            <div class="row">
            <label>senha</label>
            <input type="password" name="senha" class="form-group">
            </div>
            <div class="row">
            <label>Area de Atuação</label>
            <input type="text" name="area" class="form-group">
            </div>
            <div class="row">
                <input type="submit" class="btn btn-dark" value="Cadastrar">
            </div>

        </form>
        </div>

    </div>

@stop