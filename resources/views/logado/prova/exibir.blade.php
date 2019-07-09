<?php

$countQ = 1;


?>
<!doctype html>
<html>
<head>

    <title>{{$titulo." ".$dados['titulo']}}</title>
</head>
<body>

    <h1>{{$dados['titulo']}}</h1>
    <h2> nome: _____________________________________________________________</h2>

    @foreach(array_keys($dados['Questao']) as $questao)
        <ul style="list-style:lower-alpha">
            {{$countQ++.". ".$questao}}


            @foreach($dados['Questao'][$questao] as $alternativa)
                <li> {{$alternativa}}</li>
            @endforeach

        </ul>
    @endforeach




</body>

</html>