<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_didatico_id',
        'localizacao',
        'qtd_minima',
        'qtd_maxima',
        'qtd_atual'
    ];
}
