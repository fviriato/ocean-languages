<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estagio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function curso(){
        $this->hasOne(Curso::class);
    }
}
