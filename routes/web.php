<?php

use App\Http\Controllers\AlunosController;
use Illuminate\Support\Facades\Route;

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



Route::get('cadastroAluno', 'App\Http\Controllers\AlunosController@cadastroAluno');

Route::get('perfilAlunos', 'App\Http\Controllers\AlunosController@perfilAlunos');
Route::post('cadastrarAluno',  'App\Http\Controllers\AlunosController@cadastrarAluno');
Route::get('cadastroAlunoDisc', 'App\Http\Controllers\AlunosController@cadastroAlunoDisc');
Route::post('cadastrarAlunoDisc', 'App\Http\Controllers\AlunosController@cadastrarAlunoDisc');
Route::post('perfilAlunoProcurar', 'App\Http\Controllers\AlunosController@perfilAlunoProcurar');

Route::get('', 'App\Http\Controllers\ProfessoresController@perfilProfessores');
Route::get('perfilProfessores', 'App\Http\Controllers\ProfessoresController@perfilProfessores');
Route::get('cadastroProfessor', 'App\Http\Controllers\ProfessoresController@cadastroProfessor');
Route::post('cadastrarProfessor',  'App\Http\Controllers\ProfessoresController@cadastrarProfessor');
Route::post('perfilProfessor', 'App\Http\Controllers\ProfessoresController@perfilProfessor');

Route::get('cadastroDisciplina', 'App\Http\Controllers\DisciplinasController@cadastroDisciplina');
Route::post('cadastrarDisciplina',  'App\Http\Controllers\DisciplinasController@cadastrarDisciplina');