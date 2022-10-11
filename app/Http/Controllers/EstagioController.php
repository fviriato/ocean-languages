<?php

namespace App\Http\Controllers;

use App\Models\Estagio;
use Illuminate\Http\Request;

class EstagioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'app._config.estagio.index',
            [
                'estagios' => Estagio::all()
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
        return view('app._config.estagio.create');
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
            'nome'        => 'required|min:3|unique:estagios',
            'descricao'   => 'required'
        ];

        $feedback = [
            'nome.required'           => 'Informe o Estágio do Idioma',
            'descricao.required'      => 'Descrever as Características do Estágio de Ensino do Idioma'
        ];

        $request->validate($rule, $feedback);

        Estagio::create($request->all());

        return redirect()->route('estagio.index');
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
        return view(
            'app._config.estagio.create',
            [
                'estagio' => Estagio::find($id)
            ]
        );
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
        $estagio = Estagio::find($id);

        $rule = [
            'nome'        => "required|min:3|unique:estagios,nome,{$id},id",
            'descricao'   => 'required'
        ];

        $feedback = [
            'nome.required'           => 'Informe o Estágio do Idioma',
            'descricao.required'      => 'Descrever as Características do Estágio de Ensino do Idioma'
        ];

        $request->validate($rule, $feedback);

        $estagio->update($request->all());

        return redirect()->route('estagio.index');
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
