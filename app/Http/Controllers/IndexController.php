<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Professor;
use App\Models\Departamento;
use App\Models\Estudante;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $cursos = Curso::all();
        $professores = Professor::all();
        $departamentos = Departamento::all();
        $estudantes = Estudante::all();

        return view('index', compact(['cursos', 'professores', 'departamentos', 'estudantes']));
    }
}
