<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estagio;
use App\Models\Nivel;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'disciplina_id',
        'estagio_id',
        'nivel_id'
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function estagio()
    {
        return $this->belongsTo(Estagio::class);
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }
}
