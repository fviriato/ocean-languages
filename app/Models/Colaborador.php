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
        'cargo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
