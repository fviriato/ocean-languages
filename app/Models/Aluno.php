<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Endereco;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matricula',
        'escola_id',
        'escolaridade_id',
    ];

    public function responsavel()
    {
        return $this->hasOne(Responsavel::class);
    }
}
