<?php


use App\Http\Controllers\AlunoController;
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


route::get('/home/aluno',[AlunoController::class, 'home'])->name('aluno.home');
route::resource('/aluno', AlunoController::class);

