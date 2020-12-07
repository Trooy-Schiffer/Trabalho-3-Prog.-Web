<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudantes = Estudante::all();
        return view('estudantes.index', compact('estudantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('estudantes.create', compact('cursos'));
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
                'matricula' => 'required|min:12|unique:estudantes',
                'telefone' => 'required',
                'email' => 'required|unique:estudantes',
            ],
            [
                'nome.required' => 'O nome do estudante é obrigatório',
                'matricula.required' => 'Os dados da matricula é obrigatório',
                'matricula.min' => 'A matricula deve ter no minimo 12 caracteres',
                'matricula.unique' => 'Esta matricula já está cadastrada',
                'telefone.required' => 'O telefone é obrigatório',
                'email.required' => 'O E-mail é obrigatório',
                'email.unique' => 'Este E-mail já está cadastrado',
            ]
        );

        $estudante = new Estudante();
        $estudante->nome = $request->nome;
        $estudante->matricula = $request->matricula;
        $estudante->telefone = $request->telefone;
        $estudante->email = $request->email;
        $estudante->save();
        $estudante->cursos()->sync($request->cursos);

        $cursosRequest = $request->cursos;
        $cursos = Curso::all();
        foreach($cursos as $curso) {
            foreach($cursosRequest as $cursoRequest) {
                if ($curso == $cursoRequest) {
                    $curso->estudantes()->sync($estudante);
                }
            }
        }

        return redirect()->route('estudantes.index')
            ->with('msg_success', 'Estudante cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudante $estudante)
    {
        $cursos = $estudante->cursos;
        return view('estudantes.show', compact(['estudante', 'cursos']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudante $estudante)
    {
        $cursos = Curso::all();
        return view('estudantes.edit', compact(['estudante', 'cursos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudante $estudante)
    {
        $request->validate(
            [
                'nome' => 'required',
                
                'matricula' => [
                    'required',
                    'min:12',
                    Rule::unique('estudantes')->ignore($estudante->id)
                ],

                'telefone' => 'required',

                'email' => [
                    'required',
                    Rule::unique('estudantes')->ignore($estudante->id)
                ],
            ],
            [
                'nome.required' => 'O nome do estudante é obrigatório',
                'matricula.required' => 'Os dados da matricula é obrigatório',
                'matricula.min' => 'A matricula deve ter no minimo 12 caracteres',
                'matricula.unique' => 'Esta matricula já está cadastrada',
                'telefone.required' => 'O telefone é obrigatório',
                'email.required' => 'O E-mail é obrigatório',
                'email.unique' => 'Este E-mail já está cadastrado',
            ]
        );

        $estudante->nome = $request->nome;
        $estudante->matricula = $request->matricula;
        $estudante->telefone = $request->telefone;
        $estudante->email = $request->email;
        $estudante->save();
        $estudante->cursos()->sync($request->cursos);

        $cursosRequest = $request->cursos;
        $cursos = Curso::all();
        foreach($cursos as $curso) {
            foreach($cursosRequest as $cursoRequest) {
                if ($curso == $cursoRequest) {
                    $curso->estudantes()->sync($estudante);
                }
            }
        }

        return redirect()->route('estudantes.index')
            ->with('msg_success', 'Estudante atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudante $estudante)
    {
        if ($estudante->delete())
            return redirect()->route('estudantes.index')
                ->with('msg_success', 'Estudante removido com sucesso.');

        return redirect()->route('estudantes.index')
            ->with('msg_error', 'Ocorreu um erro ao remover este estudante.');
    }
}
