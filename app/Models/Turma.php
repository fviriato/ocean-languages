<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'curso_id',
        'colaborador_id',
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

}
