<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AulaReforco extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_aula',
        'aluno_id',
        'colaborador_id',
        'status',
        'presenca_aluno'
    ];
}
