<?php


use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\EscolaridadeController;
use App\Http\Controllers\EstagioController;
use App\Http\Controllers\GeneroController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/pedagogico', [App\Http\Controllers\HomeController::class, 'pedagogico'])->name('pedagogico');
// Route::get('/financeiro', [App\Http\Controllers\HomeController::class, 'financeiro'])->name('financeiro');
// Route::get('/administrativo', [App\Http\Controllers\HomeController::class, 'administrativo'])->name('administrativo');
// Route::get('/gerencial', [App\Http\Controllers\HomeController::class, 'gerencial'])->name('gerencial');
// Route::get('admin/pages', [App\Http\Controllers\HomeController::class, 'teste'])->name('teste');



route::get('/aluno/{aluno}/matricular',[AlunoController::class, 'matricular'])->name('aluno.selecionar.contrato');
route::post('/aluno/matricular',[AlunoController::class, 'matricular'])->name('aluno.matricular');


route::get('/home/aluno',[AlunoController::class, 'home'])->name('aluno.home');
route::resource('/aluno', AlunoController::class);
route::get('/home/professor',[ProfessorController::class, 'home'])->name('professor.home');
route::resource('/professor', ProfessorController::class);

route::resource('/turma', TurmaController::class);

Route::resource('/config', ConfigController::class);
Route::resource('genero', GeneroController::class);
Route::resource('nivel', NivelController::class);
Route::resource('estagio', EstagioController::class);
Route::resource('disciplina', DisciplinaController::class);
Route::resource('escola', EscolaController::class);
Route::resource('escolaridade', EscolaridadeController::class);
