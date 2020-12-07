<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professores';

    public function departamento() {
        return $this->belongsTo("App\Models\Departamento");
    }

    public function cursos() {
        return $this->hasMany("App\Models\Curso");
    }
}
