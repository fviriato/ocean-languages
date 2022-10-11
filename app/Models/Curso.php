<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\IdiomaDisciplina;
use App\Models\Estagio;
use App\Models\Nivel;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'idioma_disciplina_id',
        'estagio_id',
        'nivel_id'
    ];

    public function idiomaDisciplina()
    {
        return $this->belongsTo(IdiomaDisciplina::class);
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
