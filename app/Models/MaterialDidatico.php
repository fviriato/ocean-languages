<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialDidatico extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nome',
        'informacoes_adicionais',
        'preco_compra'
    ];
}
