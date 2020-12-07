@extends('layouts.principal')

@section('main')

<div class="container">
    <div class="py-5 text-center">
        <h2>Professor</h2>
    </div>
    <div class="row">
        <h3>
          ID: {{ $professor->id }}
        </h3>
    </div>
    <div class="row">       
        <h3>
          Nome: {{ $professor->nome }}
        </h3>          
    </div>
    <div class="row">       
        <h3>
          Telefone: {{ $professor->telefone }}
        </h3>          
    </div>
    <div class="row">       
        <h3>
          E-mail: {{ $professor->email }}
        </h3>          
    </div>

      <div class="row mt-5">
      
        <h4>Departamento:</h4>
  
        <div class="col-md-12" >
          
          @if($departamento == null)
            <p> Nenhum departamento associado.</p>
          @else 
            <ul>
                <li> {{ $departamento->nome }} </li>
            </ul>
          @endif
          
        </div>
      </div>

      <div class="row mt-5">
      
        <h4>Cursos:</h4>
  
        <div class="col-md-12" >
          
          @if(count($cursos) == 0)
            <p> Nenhum curso associado.</p>
          @else 
            <ul>
              @foreach($cursos as $curso)
                <li> {{ $curso->nome }} </li>
              @endforeach
            </ul>
          @endif
          
        </div>
      </div>

    <div class="row mt-5">
      <a href="{{ route('professores.index') }}" 
        class="btn btn-primary" role="button" aria-pressed="true">Voltar</a>
    </div>
  </div>

</div>

@endsection