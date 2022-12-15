<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app._config.disciplina.index',[
            'disciplinas' => Disciplina::orderBy('tipo','asc')->get()
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
            'nome'    => 'required',
            'tipo'    => 'required',
        ];
        $feedback = [
            'nome.required'  => 'Informe o  Nome da Disciplina',
            'tipo.required'  => 'Informar o Tipo'
        ];

        $request->validate($rule, $feedback);

        Disciplina::create($request->all());

        return redirect()->route('disciplina.index');
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
        return view('app._config.disciplina.create',[
            'disciplina' => Disciplina::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disciplina $disciplina)
    {
    
        $rule = [
            'nome'    => 'required',
            'tipo'    => 'required',
        ];
        $feedback = [
            'nome.required'  => 'Informe o  Nome da Disciplina',
            'tipo.required'  => 'Informar o Tipo'
        ];

        $request->validate($rule, $feedback);

        $disciplina->update($request->all());

        return redirect()->route('disciplina.index');

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
