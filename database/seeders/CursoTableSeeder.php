<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Estudante;

class CursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::create([
            'nome' => 'Programação WEB',
            'duracao' => 64,
            'professor_id' => 1,
            'departamento_id' => 1,
        ]);

        Curso::create([
            'nome' => 'Programação Orientada a Objetos',
            'duracao' => 64,
            'professor_id' => 1,
            'departamento_id' => 1,
        ]);

        Curso::create([
            'nome' => 'Algoritmos 1',
            'duracao' => 64,
            'professor_id' => 2,
            'departamento_id' => 1,
        ]);

        Curso::create([
            'nome' => 'Ingles',
            'duracao' => 64,
            'professor_id' => 3,
            'departamento_id' => 2,
        ]);

        Curso::create([
            'nome' => 'Portugues',
            'duracao' => 64,
            'professor_id' => 4,
            'departamento_id' => 2,
        ]);

        Curso::find(1)->estudantes()->sync([1, 2, 3]);
        Estudante::find(1)->cursos()->sync([1, 2]);

        Curso::find(2)->estudantes()->sync([1, 2, 3]);
        Estudante::find(2)->cursos()->sync([1, 2]);

        Curso::find(3)->estudantes()->sync([3]);
        Estudante::find(3)->cursos()->sync([1, 2, 3, 4, 5]);

        Curso::find(4)->estudantes()->sync([3, 4, 5]);
        Estudante::find(4)->cursos()->sync([4, 5]);

        Curso::find(5)->estudantes()->sync([3, 4, 5]);
        Estudante::find(5)->cursos()->sync([4, 5]);
    }
}
