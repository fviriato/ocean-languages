<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'genero_id',
        'cpf',
        'rg',
        'telefone',
        'email',
        'responsavel_nome',
        'responsavel_data_nascimento',
        'responsavel_cpf',
        'responsavel_rg',
        'responsavel_telefone',
        'responsavel_email',
        'tipo_usuario_id'
    ];
}
