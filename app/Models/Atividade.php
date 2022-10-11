<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;

    protected $fillable = [
        'aulas_idioma_id',
        'nome',
        'descricao',
        'tipo',
        'nota',
        'data_aplicacao',
        'data_entrega',
        'status'
    ];
}
