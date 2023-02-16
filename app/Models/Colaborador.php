<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function registroProfessor()
    {

        $ano = date('Y');
        $ultimoRegistro = DB::table('colaboradors')->orderBy('id', 'DESC')->first();

        if (!$ultimoRegistro  || $ultimoRegistro  == null) {

            $proxRegistro = '001';

        } else {

            $dados = str_split($ultimoRegistro->registro, 4);
            $proxRegistro = str_pad($dados[1] + 1, 3, 0, STR_PAD_LEFT);

        }

        $proxRegistro = $ano . $proxRegistro;

        return $proxRegistro;

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}
