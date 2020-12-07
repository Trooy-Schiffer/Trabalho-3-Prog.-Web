@extends('layouts.principal')

@section('main')

<div class="container">
    <div class="py-5 text-center">
        <h2>Curso</h2>
    </div>
    <div class="row">
        <h3>
          ID: {{ $curso->id }}
        </h3>
    </div>
    <div class="row">       
        <h3>
          Nome: {{ $curso->nome }}
        </h3>          
    </div>
    <div class="row">       
        <h3>
          Duração: {{ $curso->duracao }}
        </h3>          
    </div>
    
    <div class="row mt-5">
      
      <h4>Departamento:</h4>

      <div class="col-md-12" >
        
        @if($departamento == null)
          <p> Nenhum Departamento associado.</p>
        @else 
          <ul>
            <li> {{ $departamento->nome }} </li>
          </ul>
        @endif
        
      </div>
    </div>

    <div class="row mt-5">
      
      <h4>Professor:</h4>
  
      <div class="col-md-12" >
          
        @if($professor == null)
          <p> Nenhum professor associado.</p>
        @else 
          <ul>
            <li> {{ $professor->nome }} </li>
          </ul>
        @endif  
          
      </div>
    </div>

    <div class="row mt-5">
      
      <h4>Estudantes:</h4>
  
      <div class="col-md-12" >
          
        @if(count($estudantes) == 0)
          <p> Nenhum estudante associado.</p>
        @else 
          <ul>
            @foreach($estudantes as $estudante)
              <li> {{ $estudante->nome }} </li>
            @endforeach
          </ul>
        @endif 
          
      </div>
    </div>  

    <div class="row mt-5">
      <a href="{{ route('cursos.index') }}" 
        class="btn btn-primary" role="button" aria-pressed="true">Voltar</a>
    </div>
  </div>

</div>

@endsection