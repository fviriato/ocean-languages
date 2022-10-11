<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'responsavel_nome',
        'responsavel_data_nascimento',
        'responsavel_cpf',
        'responsavel_rg',
        'responsavel_telefone',
        'responsavel_email',
        'responsavel_profissao',
        'responsavel_escolaridade_id',
        'responsavel_cep',
        'responsavel_logradouro',
        'responsavel_numero',
        'responsavel_complemento',
        'responsavel_bairro',
        'responsavel_municipio',
        'responsavel_estado'

    ];
}
