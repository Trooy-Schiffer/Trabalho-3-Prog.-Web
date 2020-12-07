<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    public function cursos() {
        return $this->hasMany("App\Models\Curso");
    }
    public function professores() {
        return $this->hasMany("App\Models\Professor");
    }
}
