<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app._config.disciplina.index', [
            'disciplinas' => Disciplina::orderBy('tipo', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app._config.disciplina.create');
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
            'nome' => 'required|unique:disciplinas',
            'tipo' => 'required'
        ];

        $feedback = [
            'nome.required' => 'Informar o Idioma ou nome da Disciplina',
            'nome.unique'   => 'O nome informado já está cadastrado',
            'tipo.required' => 'Informar se é um Idioma ou uma Disciplina'
        ];

        $request->validate($rule, $feedback);


        Disciplina::create($request->all());
        return view('app._config.disciplina.index', [
            'disciplinas' => Disciplina::orderBy('tipo', 'ASC')->get()
        ]);
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
        $disciplina = Disciplina::find($id);
        return view('app._config.disciplina.create', [
            'disciplina' => $disciplina
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
        $disciplina = Disciplina::find($id);

        $rule = [
            'nome' => "required|unique:disciplinas,nome,{$id},id",
            'tipo' => 'required|'
        ];

        $feedback = [
            'nome.required' => 'Informar o Idioma ou nome da Disciplina',
            'nome.unique'   => 'O nome informado já está cadastrado',
            'tipo.required' => 'Informar se é um Idioma ou uma Disciplina'
        ];

        $request->validate($rule, $feedback);

        $disciplina->update($request->all());

        return view('app._config.disciplina.index', [
            'disciplinas' => Disciplina::orderBy('tipo', 'ASC')->get()
        ]);


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
