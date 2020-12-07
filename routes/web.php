<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfessorController;
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

Route::get('/', IndexController::class)->name('index');
Route::resource('estudantes', EstudanteController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('professores', ProfessorController::class);
Route::resource('cursos', CursoController::class);
