<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 45);
            $table->integer('duracao');

            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('professor_id');
            
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('professor_id')->references('id')->on('professores');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
