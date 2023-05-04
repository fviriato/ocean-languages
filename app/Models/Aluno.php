<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// use OCILob;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matricula',
        'profissao',
        'escola_id',
        'escolaridade_id',
    ];

    public function gerarMatriculaAluno()
    {

        $ano = date('Y');
        $ultimaMatricula = DB::table('alunos')->orderBy('id', 'DESC')->first();

        if (!$ultimaMatricula  || $ultimaMatricula  == null) {

            $proxMatricula = '0001';
        } else {

            $dados = str_split($ultimaMatricula->matricula, 4);
            $proxMatricula = str_pad($dados[1] + 1, 4, 0, STR_PAD_LEFT);
        }

        $proxMatricula = $ano . $proxMatricula;

        return $proxMatricula;
    }

    public function responsavel()
    {
        return $this->hasOne(Responsavel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contrato(){

        return $this->belongsTo(Contrato::class);
    }

}
