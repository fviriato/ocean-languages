<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissaoAcesso extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id','permissao_id','criacao','edicao','leitura'];
}
