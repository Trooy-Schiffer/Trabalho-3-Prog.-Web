<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estudante;

class EstudanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estudante::create([
            'nome' => 'Thiago de Souza Carvalho',
            'matricula' => '201721640013',
            'telefone' => '66996015943',
            'email' => 'thiago_trooy951@hotmail.com',
        ]);

        Estudante::create([
            'nome' => 'Thierry Nunes Silva',
            'matricula' => '201721640006',
            'telefone' => '66999849614',
            'email' => 'thierrynuness7@gmail.com',
        ]);

        Estudante::create([
            'nome' => 'Aluno Teste1',
            'matricula' => '201721640000',
            'telefone' => '66900001111',
            'email' => 'teste1@hotmail.com',
        ]);

        Estudante::create([
            'nome' => 'Aluno Teste2',
            'matricula' => '201721640000',
            'telefone' => '66900002222',
            'email' => 'teste2@hotmail.com',
        ]);

        Estudante::create([
            'nome' => 'Aluno Teste3',
            'matricula' => '201721640000',
            'telefone' => '66900003333',
            'email' => 'teste3@hotmail.com',
        ]);
    }
}
