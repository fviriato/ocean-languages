<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'numero',
        'data_inicio',
        'primeiro_dia_semana',
        'segundo_dia_semana',
        'hora_inicio',
        'hora_fim',
        'valor_mensal',
        'data_pagamento'
    ];
}
