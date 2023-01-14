<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'profissao',
        'escolaridade_id',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
