<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoIdioma extends Model
{
    use HasFactory;

    protected $fillable = [
        'contrato_id',
        'tipo',
        'idioma_disciplina_id'
    ];
}
