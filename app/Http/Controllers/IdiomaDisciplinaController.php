<?php

namespace App\Http\Controllers;

use App\Models\IdiomaDisciplina;
use Illuminate\Http\Request;

class IdiomaDisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app._config.idioma_disciplina.index', [
            'idiomaDisciplinas' => IdiomaDisciplina::orderBy('tipo')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app._config.idioma_disciplina.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'nome'        => 'required|min:3|unique:idioma_disciplinas',
            'tipo'        => 'required',
        ];

        $feedback = [
            'nome.required'           => 'Informe o Nome do Idioma ou da Disciplina',
            'nome.unique'             => 'O Idioma ou Disciplina Informado já Está Cadastrado',
            'tipo.required'           => 'Informe se é um Idioma ou uma Disciplina',
        ];

        $request->validate($rule, $feedback);

        IdiomaDisciplina::create($request->all());

        return redirect()->route('idiomaDisciplina.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('app._config.idioma_disciplina.create', [
            'idiomaDisciplina' => IdiomaDisciplina::find($id)
        ]);
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
        $idiomaDisciplina = IdiomaDisciplina::find($id);

        $rule = [
            'nome'        => "required|min:3|unique:idioma_disciplinas,id,{$id},id",
            'tipo'        => 'required',
        ];

        $feedback = [
            'nome.required'           => 'Informe o Nome do Idioma ou da Disciplina',
            'nome.unique'             => 'O Idioma ou Disciplina Informado já Está Cadastrado',
            'tipo.required'           => 'Informe se é um Idioma ou uma Disciplina',
        ];

        $request->validate($rule, $feedback);

        $idiomaDisciplina->update($request->all());

        return redirect()->route('idiomaDisciplina.index');
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
