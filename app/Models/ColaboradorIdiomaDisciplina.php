<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboradorIdiomaDisciplina extends Model
{
    use HasFactory;

    protected $fillable = [
        'colaborador_id',
        'idioma_disciplina_id',
        'data_cadastro'
    ];
}
