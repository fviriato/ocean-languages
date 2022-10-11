<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomaDisciplina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'tipo'
    ];

    public function curso()
    {
        $this->hasOne(Curso::class);
    }
}
