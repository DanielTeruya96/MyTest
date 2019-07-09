
@extends('principal')
@section('titulo','Cadastro')

@section('content')
    @include('topo')
    <section>
        <h1>Login</h1>

        @if(!empty($erro))
            <div class="alert alert-danger" role="alert">
                Senha Incorreta
            </div>
        @endif
        <div class="container-fluid">
            <form class="form-group" action="{{action("UsuarioController@singup")}}" method="POST">
                <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                <div class="row">
                <label >Email</label>
                <input type="email" name="email" class="form-control">
                </div>
                <div class="row">
                    <label >Senha</label>
                    <input class="form-control" type="password" name="senha">

                </div>
                <div class="row">
                    <input type="submit" class="btn btn-dark">
                </div>

            </form>
        </div>
    </section>

@stop
