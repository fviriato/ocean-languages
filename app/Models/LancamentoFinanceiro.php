<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LancamentoFinanceiro extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_lancamento_id',
        'descricao',
        'valor',
        'data_lancamento',
        'data_vencimento',
        'status'
    ];
}
