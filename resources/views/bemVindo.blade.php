@extends('principal')
@section('titulo', 'Bem vindo')


@section('content')

    <section>
        <h1>Bem vindo ao My Test</h1>

        @if(!empty($cadastrado))
            <div class="alert alert-success" role="alert">
              Cadastrado com Sucesso
            </div>
        @endif
    </section>

@stop