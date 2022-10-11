<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modulo;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'modulo_id'];

    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }
}
