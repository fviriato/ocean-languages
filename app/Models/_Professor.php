<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'registro',
        'cargo_id',
        'salario',
        'forma_contratacao'
    ];


   
}
