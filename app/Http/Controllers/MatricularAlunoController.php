<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Genero;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;

class MatricularAlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'app.matricula.enroll',
            [
                'users' => User::where('tipo', 'aluno')->get(),
                'turmas' => Turma::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Aluno Matriculado";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verContrato(Request $request)
    {

        $rule = [
            'user_id'            => 'required',
            'turma_id'           => 'required',
            'valor_mensal'       => 'required',
            'data_pagamento'     => 'required',
            'material_didatico'  => 'required',
            'parcelas'           => 'required'
        ];

        $feedback = [
            'user_id.required'   => 'Informar o Nome do Aluno',
            'turma_id.required'   => 'Informar a Turma que o Aluno será Matriculado',
            'required'     => 'O campo :attribute é obrigatorio',
        ];

        $request->validate($rule, $feedback);

        $dados = $request->all();
        $user = User::where('id', $request->input('user_id'))->get();

        return view('app.contrato.aula-grupo', [
            'user' => $user[0],
            'turma' => Turma::find($request->input('turma_id')),
            'contrato' => $dados
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Aluno $aluno, Turma $turma)
    {
        dd($aluno[0],  $turma->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {


        dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
