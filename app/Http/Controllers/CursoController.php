<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Professor;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professores = Professor::all();
        $departamentos = Departamento::all();
        return view('cursos.create', compact('professores', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|unique:cursos',
                'duracao' => 'required',
            ],
            [
                'nome.required' => 'O nome do curso é obrigatório',
                'nome.unique' => 'Este curso já está cadastrado',
                'duracao.required' => 'A duração é obrigatória',
            ]
        );

        $curso = new Curso();
        $curso->nome = $request->nome;
        $curso->duracao = $request->duracao;
        $curso->departamento_id = $request->departamento;
        $curso->professor_id = $request->professor;
        $curso->save();

        return redirect()->route('cursos.index')
            ->with('msg_success', 'Curso cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        $departamento = $curso->departamento;
        $professor = $curso->professor;
        $estudantes = $curso->estudantes;
        return view('cursos.show', compact(['curso', 'departamento', 'professor', 'estudantes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        $professores = Professor::all();
        $departamentos = Departamento::all();
        return view('cursos.edit', compact(['curso', 'professores', 'departamentos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate(
            [
                'nome' => [
                    'required',
                    Rule::unique('cursos')->ignore($curso->id)
                ],
                'duracao' => 'required',
            ],
            [
                'nome.required' => 'O nome do curso é obrigatório',
                'nome.unique' => 'Este curso já está cadastrado',
                'duracao.required' => 'A duração é obrigatória',
            ]
        );

        $curso->nome = $request->nome;
        $curso->duracao = $request->duracao;
        $curso->departamento_id = $request->departamento;
        $curso->professor_id = $request->professor;
        $curso->save();

        return redirect()->route('cursos.index')
            ->with('msg_success', 'Curso atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        if ($curso->delete())
            return redirect()->route('cursos.index')
                ->with('msg_success', 'Curso removido com sucesso.');

        return redirect()->route('cursos.index')
            ->with('msg_error', 'Ocorreu um erro ao remover este curso.');
    }
}
