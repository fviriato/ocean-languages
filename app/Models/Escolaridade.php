<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolaridade extends Model
{
    use HasFactory;

    protected $fillable = ['descricao'];

    public function responsavel()
    {
        return $this->hasOne(Responsavel::class);
    }
}
