<?php


use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\EscolaridadeController;
use App\Http\Controllers\EstagioController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TurmaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('auth.login');
});

Route::post('/home', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::get('/home/aluno', [AlunoController::class, 'home'])->name('aluno.home');
route::resource('/aluno', AlunoController::class);
route::get('/home/professor', [ProfessorController::class, 'home'])->name('professor.home');
route::resource('/professor', ProfessorController::class);

route::get('/contrato/home', [ContratoController::class, 'home'])->name('contrato.home');
route::get('/contrato/revisar', [ContratoController::class, 'revisar'])->name('contrato.revisar');
route::get('/contrato/{aluno}/{turma}/{contrato}/ver', [ContratoController::class, 'verContrato'])->name('contrato.ver');
route::resource('/contrato', ContratoController::class);

route::resource('/matricula',MatriculaController::class);

route::get('/turma/{turma}/ver', [TurmaController::class,'verAlunos'])->name('turma.ver.alunos');
route::resource('/turma', TurmaController::class);
Route::resource('/config', ConfigController::class);
Route::resource('genero', GeneroController::class);
Route::resource('nivel', NivelController::class);
Route::resource('estagio', EstagioController::class);
Route::resource('cargo', CargoController::class);
Route::resource('disciplina', DisciplinaController::class);
Route::resource('escola', EscolaController::class);
Route::resource('escolaridade', EscolaridadeController::class);
