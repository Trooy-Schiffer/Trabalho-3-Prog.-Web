<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;

class ProfessorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Professor::create([
            'nome' => 'Maikon Bueno',
            'telefone' => '66999991111',
            'email' => 'maikon@gmail.com',
            'departamento_id' => 1,
        ]);

        Professor::create([
            'nome' => 'Fulano',
            'telefone' => '66999992222',
            'email' => 'professor_teste2@gmail.com',
            'departamento_id' => 1,
        ]);

        Professor::create([
            'nome' => 'Ciclano',
            'telefone' => '66999993333',
            'email' => 'professor_teste3@gmail.com',
            'departamento_id' => 2,
        ]);

        Professor::create([
            'nome' => 'Beltrano',
            'telefone' => '66999994444',
            'email' => 'professor_teste4@gmail.com',
            'departamento_id' => 2,
        ]);
    }
}
