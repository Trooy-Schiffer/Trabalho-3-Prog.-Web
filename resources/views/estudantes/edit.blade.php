@extends('layouts.principal')

@section('main')

<div class="container">
    <div class="py-5 text-center">
        <h2>Cadastro de Estudantes</h2>
    </div>
    <div class="row">
        <div class="col-md-12" >

            <form action="{{ route('estudantes.update', $estudante->id) }}" 
                class="card p-2 my-4" method="POST"
            >
                @csrf
                @method('PUT')

                <div class="input-group">
                    <input type="text" placeholder="Nome do Estudante" 
                        value="{{ $estudante->nome }}"
                        class="form-control" name="nome">
                    <input type="text" placeholder="Matricula" 
                        value="{{ $estudante->matricula }}"
                        class="form-control" name="matricula">
                    <input type="text" placeholder="Telefone" 
                        value="{{ $estudante->telefone }}"
                        class="form-control" name="telefone">
                    <input type="text" placeholder="E-mail" 
                        value="{{ $estudante->email }}"
                        class="form-control" name="email">
                </div>

                <div class="form-group">
                    <br>
                    <label for="cursos">Selecione os Cursos</label>
                    <select multiple size="5" class="form-control" id="cursos" 
                        name="cursos[]"  aria-describedby="cursosHelp">
                        @foreach($cursos as $curso)  
                            <option value="{{ $curso->id }}">
                                {{ $curso->nome }}
                            </option>
                        @endforeach
                    </select>
                    <small id="cursossHelp" class="form-text text-muted">
                        Utilize as teclas 'ctrl' ou 'shift' para selecionar mais que um curso.
                    </small>                        
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>

                @error("nome")
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
                @enderror
                @error("matricula")
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
                @enderror
                @error("telefone")
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
                @enderror  
                @error("email")
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
                @enderror  
            </form>
            <a href="{{ route('estudantes.index') }}" 
            class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>

        </div>
    </div>
</div>

@endsection