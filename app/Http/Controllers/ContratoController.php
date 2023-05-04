<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Contrato;
use App\Models\Turma;
use Illuminate\Http\Request;

class ContratoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('app.aluno.contrato.home', [
            'contratos'  => Contrato::with(['turma'])->paginate(10)
        ]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.aluno.contrato.index', [
            'alunos'  => Aluno::with(['user'])->get()->sortBy('user.name'),
            'turmas'  => Turma::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function revisar(Request $request)
    {

        $rule = [
            'aluno_id'          => 'required',
            'turma_id'          => 'required',
            'valor_mensal'      => 'required',
            'data_pagamento'    => 'required',
            'material_didatico' => 'required',
            'parcelas'          => 'required'
        ];

        $feedback = [
            'aluno_id.required'          => 'Selecionar o Aluno',
            'turma_id.required'          => 'Selecionar a Turma',
            'valor_mensal.required'      => 'Informar o valor da mensalidade',
            'data_pagamento.required'    => 'Informar a data do pagamento da mensalidade',
            'material_didatico.required' => 'Informar o valor do material didático',
            'parcelas.required'          => 'Informar o número de parcelas'
        ];

        $request->validate($rule, $feedback);


        $aluno = Aluno::find($request->aluno_id);
        $turma = Turma::find($request->turma_id);

        return view('app.aluno.contrato.grupo', [

            'aluno'    => $aluno,
            'turma'    => $turma,
            'contrato' => $request

        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        Contrato::create($request->all());

        return view('app.aluno.contrato.index', [
            'alunos'  => Aluno::with(['user'])->get()->sortBy('user.name'),
            'turmas'  => Turma::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {



        return view('app.aluno.contrato.index', [
            'alunos'  => Aluno::with(['user'])->get()->sortBy('user.name'),
            'turmas'  => Turma::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrato $contrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato)
    {
        //
    }


    public function verContrato(Aluno $aluno, Turma $turma, Contrato $contrato)
    {
        // $a = $aluno->find($aluno);
        // dd($aluno);
        return view('app.aluno.contrato.grupo', [

            'aluno'    => $aluno,
            'turma'    => $turma,
            'contrato' => $contrato

        ]);
    }
}
