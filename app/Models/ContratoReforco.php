<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoReforco extends Model
{
    use HasFactory;

    protected $fillable = [
        'idioma_disciplina_id',
        'contrato_id'

    ];
}
