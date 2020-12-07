@extends('layouts.principal')

@section('main')

<div class="container">
    <div class="py-5 text-center">
        <h2>Colegio</h2>
    </div>
    <div class="row">

        <!-- Cursos -->
        <div class="col-md-4">
            <h3>Cursos</h3>
            @foreach($cursos as $c)
                <td>{{ $c->nome }} <br> </td>
            @endforeach
            <br>
        </div>

        <!-- Professores -->
        <div class="col-md-4">
            <h3>Professores</h3>
            @foreach($professores as $p)
                <td>{{ $p->nome }} <br> </td>
            @endforeach
            <br>
        </div>

        <!-- Departamentos -->
        <div class="col-md-4">
            <h3>Departamentos</h3>
            @foreach($departamentos as $d)
                <td>{{ $d->nome }} <br> </td>
            @endforeach
            <br>
        </div>

        <!-- Estudantes -->
        <div class="col-md-4">
            <h3>Estudantes</h3>
            @foreach($estudantes as $e)
                <td>{{ $e->nome }}  <br> </td>
            @endforeach
            <br>
        </div>
    
    </div>
</div>

@endsection