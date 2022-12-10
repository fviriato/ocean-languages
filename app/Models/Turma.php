<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso_id',
        'colaborador_id',
        'nome',
        'data_inicio',
        'data_fim',
        'hora_inicio',
        'hora_fim',
        'primeiro_dia_semana',
        'segundo_dia_semana',
        'modalidde',
        'tipo'
    ];


    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    public function idiomaDisciplina()
    {
        return $this->belongsTo(IdiomaDisciplina::class);
    }
}
