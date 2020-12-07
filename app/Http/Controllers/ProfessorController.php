<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = Professor::all();
        return view('professores.index', compact('professores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all();
        return view('professores.create', compact('departamentos'));
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
                'nome' => 'required',
                'telefone' => 'required',
                'email' => 'required|unique:professores',
            ],
            [
                'nome.required' => 'O nome do professor é obrigatório',
                'telefone.required' => 'O telefone é obrigatório',
                'email.required' => 'O E-mail é obrigatório',
                'email.unique' => 'Este E-mail já está cadastrado',
            ]
        );

        $professor = new Professor();
        $professor->nome = $request->nome;
        $professor->telefone = $request->telefone;
        $professor->email = $request->email;
        $professor->departamento_id = $request->departamento;
        $professor->save();

        return redirect()->route('professores.index')
            ->with('msg_success', 'Professor cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professore)
    {
        $professor = $professore;
        $departamento = $professor->departamento;
        $cursos = $professor->cursos;
        return view('professores.show', compact(['professor', 'departamento', 'cursos']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professore)
    {
        $professor = $professore;
        $departamentos = Departamento::all();
        return view('professores.edit', compact(['professor', 'departamentos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professore)
    {
        $professor = $professore;
        $request->validate(
            [
                'nome' => 'required',
                'telefone' => 'required',
                'email' => [
                    'required',
                    Rule::unique('professores')->ignore($professor->id)
                ],
            ],
            [
                'nome.required' => 'O nome do professor é obrigatório',
                'telefone.required' => 'O telefone é obrigatório',
                'email.required' => 'O E-mail é obrigatório',
                'email.unique' => 'Este E-mail já está cadastrado',
            ]
        );

        $professor->nome = $request->nome;
        $professor->telefone = $request->telefone;
        $professor->email = $request->email;
        $professor->departamento_id = $request->departamento;
        $professor->save();

        return redirect()->route('professores.index')
            ->with('msg_success', 'Professor atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professore)
    {
        $professor = $professore;
        if ($professor->cursos->count() > 0)
            return back()
                ->with('msg_error', 'Nao foi possivel remover este professor pois existem cursos relacionados a ele.');

        $professor->delete();

        return redirect()->route('professores.index')
            ->with('msg_success', 'Professor removido com sucesso.');
    }
}
