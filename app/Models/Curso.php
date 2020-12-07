<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function departamento() {
        return $this->belongsTo("App\Models\Departamento");
    }

    public function professor() {
        return $this->belongsTo("App\Models\Professor");
    }

    public function estudantes() {
        return $this->belongsToMany('App\Models\Estudante');
    }
}
