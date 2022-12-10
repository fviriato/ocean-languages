<?php


use App\Http\Controllers\Aluno\AlunoController;
use App\Http\Controllers\Aluno\MatricularAlunoController;
use App\Http\Controllers\Professor\ProfessorController;



use App\Http\Controllers\MenuController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\EstagioController;
use App\Http\Controllers\GeneroController;

use App\Http\Controllers\SessaoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AulaIdiomaController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\EscolaridadeController;


use App\Http\Controllers\PermissaoAcessoController;
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
Route::get('/pedagogico', [App\Http\Controllers\HomeController::class, 'pedagogico'])->name('pedagogico');
Route::get('/financeiro', [App\Http\Controllers\HomeController::class, 'financeiro'])->name('financeiro');
Route::get('/administrativo', [App\Http\Controllers\HomeController::class, 'administrativo'])->name('administrativo');
Route::get('/gerencial', [App\Http\Controllers\HomeController::class, 'gerencial'])->name('gerencial');

Route::get('admin/pages', [App\Http\Controllers\HomeController::class, 'teste'])->name('teste');



Route::get('/home/aluno', [AlunoController::class, 'home'])->name('aluno.home');
Route::resource('aluno', AlunoController::class);




Route::get('/home/professor', [ProfessorController::class, 'home'])->name('professor.home');
Route::resource('professor', ProfessorController::class);
Route::resource('colaborador', ColaboradorController::class);

Route::get('matricular/contrato', [MatricularAlunoController::class,'verContrato'])->name('matricular.contrato');
Route::post('matricular/contrato', [MatricularAlunoController::class,'verContrato'])->name('matricular.contrato');

Route::resource('/home/turma', TurmaController::class);

Route::resource('matricular', MatricularAlunoController::class);


//CONFIGURAÇÕES DO SISTEMA
Route::resource('config', ConfigController::class);
Route::resource('genero', GeneroController::class);
Route::resource('nivel', NivelController::class);
Route::resource('estagio', EstagioController::class);
// Route::resource('disciplina', DisciplinaController::class);
Route::resource('escola', EscolaController::class);
Route::resource('escolaridade', EscolaridadeController::class);
Route::resource('curso', CursoController::class);


// Analisar necessidade de manter as rotas abaixo

// Route::get('professor/materia', [ProfessorController::class,'materia'])->name('professor.materia');
// Route::resource('professor', ProfessorController::class);
// Route::resource('sessao', SessaoController::class);


//Route::get('aula/idioma', [AulaIdiomaController::class, 'index'])->name('aula.idioma.index');
// Route::resource('idioma', AulaIdiomaController::class);
// Route::resource('permissoes', PermissaoAcessoController::class);

// Route::resource('modulo', ModuloController::class);
// Route::resource('menu', MenuController::class);



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
