@extends('principal')

@section('titulo', 'Visualizar')

@section('content')

    <h1>visualizar</h1>
    @if(!empty($salvado))
        <div class="alert alert-success" role="alert">
            editado com sucesso
        </div>
    @endif
    <h3>{{$prova->titulo}}</h3>

    <form action="{{action('ProvaController@editar',$prova->id)}}" method="POST">
        <input type="hidden" name="_token" value="{{{csrf_token()}}}">
        <Label>titulo</Label>
        <input type="text" name="titulo" class="form-control" value="{{$prova->titulo}}">

        <?php $countQ = 1;
        ?>
        @foreach($prova->questao as $questao)
                <label>Questão {{$countQ}}</label>
                <input type="text" name="questao{{$countQ}}" class="form-control" value="{{$questao->descricao}}">
                <?php $countA = 1;
                    ?>

                @foreach($questao->alternativa as $alternativa)
                <label>Alternativa {{$countA}}</label>
                <input type="text" name="q{{$countQ}}alternativa{{$countA}}" class="form-control" value="{{$alternativa->descricao}}">
                <label>resposta Correta?</label>
                    @if($alternativa->correta)
                    <input type="checkbox" name="q{{$countQ}}alternativaBox{{$countA}}" checked>
                    @else
                    <input type="checkbox" name="q{{$countQ}}alternativaBox{{$countA}}">
                    @endif
                    <?php $countA++; ?>
                @endforeach
            <?php $countQ++; ?>
        @endforeach
        <button type="submit"> Alterar</button>


    </form>

    <form action="{{action('ProvaController@gerar')}}" method="POST">
        <input type="hidden" name="_token" value="{{{csrf_token()}}}">
        <input type="hidden" name="id" value="{{$prova->id}}">
        <input type="number" placeholder="Quantidade" name="qtd">
        <button type="submit">Gerar Prova</button>
    </form>

    <form action="{{action('ProvaController@excluir')}}" method="POST">
        <input type="hidden" name="_token" value="{{{csrf_token()}}}">
        <input type="hidden" name="provaId" value="{{$prova->id}}">
        <button type="submit">Excluir</button>
    </form>

@stop
