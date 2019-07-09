
<div class="pos-f-t fixed-top">
    <div class="collapse " id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
        @if(session()->has('logged'))

                <ul>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{action("ProvaController@criar")}}">Nova Prova</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{action('QuestaoController@questoes')}}">Banco de Questões</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{action("UsuarioController@logout")}}">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{action("DashBoardController@home")}}">{{session('logged')->name}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-dark justify-content-end">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>




        <!--
        <div class="fixed-top box">
        <nav class="navbar navbar-light justify-content-end" style="background-color: #e3f2fd;">
            <ul >
            <li class="nav-item">
                <a class="nav-link active" href="{{action("ProvaController@criar")}}">Nova Prova</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="">Banco de Questões</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{action("UsuarioController@logout")}}">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{action("DashBoardController@home")}}">{{session('logged')->name}}</a>
            </li>
        </ul>
        </nav>

    </div>
    -->
@else



    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="{{action("UsuarioController@login")}}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{action("UsuarioController@cadastrar")}}">Registrar</a>
        </li>
    </ul>
    </div>
    </div>
    <nav class="navbar navbar-dark bg-dark justify-content-end">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    </div>

@endif