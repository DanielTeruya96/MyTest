@extends('principal')

@section('titulo', $questao->descricao)

@section('content')
    @include('topo')
    <h1>{{$questao->descricao}}</h1>

    @foreach($questao->alternativa as $alternativa)
        <?php $countA = 1;
        ?>

            <label>Alternativa {{$countA}}</label>
            <input type="text" name="alternativa{{$countA}}" class="form-control" value="{{$alternativa->descricao}}" disabled>
            <label>resposta Correta?</label>
            @if($alternativa->correta)
                <input type="checkbox" name="alternativaBox{{$countA}}" checked disabled>
            @else
                <input type="checkbox" name="alternativaBox{{$countA}}" disabled>
            @endif
            <?php $countA++; ?>


    @endforeach

@stop