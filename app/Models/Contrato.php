<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'turma_id',
        'numero',
        'valor_mensal',
        'data_pagamento',
        'material_didatico',
        'parcelas',
        'status_contrato',
        'tipo',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}
