<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Colaborador extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'registro',
        'cargo_id',
        'salario',
        'forma_remuneracao'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
