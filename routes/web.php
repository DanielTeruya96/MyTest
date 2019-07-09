<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('bemVindo');
});

Route::get('/login', 'UsuarioController@login');
Route::get('/cadastrar', 'UsuarioController@cadastrar');
Route::get('/logout', 'UsuarioController@logout');
Route::get('/home', 'DashBoardController@home');
Route::get('/prova', 'ProvaController@criar');
Route::get('/prova/ver/{id}', 'ProvaController@ver');
Route::get('/prova/questoes', 'QuestaoController@questoes');
Route::get('/prova/questoes/{id}','QuestaoController@ver');
Route::get('/prova/exibir/{seed}','ProvaController@exibir');



Route::post('/salvar', 'UsuarioController@salvar');
Route::post('/singup', 'UsuarioController@singup');
Route::post('/prova/salvar', 'ProvaController@salvar');
Route::post('/prova/editar/{id}', 'ProvaController@editar');
Route::post('/prova/gerar','ProvaController@gerar');
Route::post('/prova/excluir','ProvaController@excluir');

