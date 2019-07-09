@extends('principal')

@section('titulo', 'Questoes')

@section('content')
    @include('topo')
    <div class="container">
        <h1>Questões</h1>

        <div class="accordion" id="accordionExample">
        @foreach(array_keys($temas) as $tema)
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$tema}}" aria-expanded="true" aria-controls="collapseOne">
                                {{$tema}}
                            </button>
                        </h2>
                    </div>

                    <div id="collapse{{$tema}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                            @foreach($temas[$tema] as $questao)
                                    <li><p>{{$questao->descricao}} <a href="{{action('QuestaoController@ver',$questao->id)}}">ver</a> </p></li>
                            @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
        @endforeach
        </div>

    </div>


@stop