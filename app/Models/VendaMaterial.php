<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendaMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_didatico_id',
        'aluno_id',
        'data_venda',
        'preco_venda'
    ];
}
