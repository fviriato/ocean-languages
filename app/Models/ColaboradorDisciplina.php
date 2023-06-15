<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboradorDisciplina extends Model
{
    use HasFactory;

    protected $fillable = [
        'colaborador_id',
        'disciplina_id',
        'data_cadastro'
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
}
