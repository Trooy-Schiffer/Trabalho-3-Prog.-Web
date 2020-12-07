@extends('layouts.principal')

@section('main')

<div class="container">
    <div class="py-5 text-center">
        <h2>Cadastro de Cursos</h2>
    </div>
    <div class="row">
        <div class="col-md-12" >

            <form action="{{ route('cursos.update', $curso->id) }}" 
                class="card p-2 my-4" method="POST"
            >
                @csrf
                @method('PUT')

                <div class="input-group">
                    <input type="text" placeholder="Nome do Curso" 
                        value="{{ $curso->nome }}"
                        class="form-control" name="nome">
                    <input type="text" placeholder="Duração do Curso" 
                        value="{{ $curso->duracao }}"
                        class="form-control" name="duracao">
                </div>

                <div class="form-group">
                    <br>
                    <label for="departamento">Departamento</label>
                    <select class="form-control" id="departamento" name="departamento">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">
                                {{ $departamento->nome }}
                            </option>
                        @endforeach
                    </select> 
                </div>

                <div class="form-group">
                    <br>
                    <label for="professor">Professor</label>
                    <select class="form-control" id="professor" name="professor">
                        @foreach($professores as $professor)
                            <option value="{{ $professor->id }}">
                                {{ $professor->nome }}
                            </option>
                        @endforeach
                    </select> 
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>

                @error("nome")
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
                @enderror
                @error("duracao")
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
                @enderror 
            </form>
            <a href="{{ route('cursos.index') }}" 
            class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>

        </div>
    </div>
</div>

@endsection