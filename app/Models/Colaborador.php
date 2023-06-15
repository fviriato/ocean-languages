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
        'forma_remuneracao',
        'valor_hora_aula',
        'formacao',
        'segunda_inicio',
        'segunda_termino',
        'terca_inicio',
        'terca_termino',
        'quarta_inicio',
        'quarta_termino',
        'quinta_inicio',
        'quinta_termino',
        'sexta_inicio',
        'sexta_termino',
        'sabado_inicio',
        'sabado_termino',
        'domingo_inicio',
        'domingo_termino',
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
        return $this->belongsTo(User::class)->orderBy('name');
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
