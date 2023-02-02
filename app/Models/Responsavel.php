<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'user_id',
        'profissao',
        'escolaridade_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aluno()
    {
        return $this->hasOne(Aluno::class);
    }

    public function escolaridade()
    {
        return $this->hasOne(Escolaridade::class);
    }
}
