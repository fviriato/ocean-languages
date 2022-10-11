<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Nivel;


class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app._config.nivel.index', [
            'niveis'   => Nivel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('app._config.nivel.create', []);
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
            'nome'        => 'required|min:3|unique:nivels',
            'sigla'       => 'required|unique:nivels',
            'descricao'   => 'required'
        ];

        $feedback = [
            'nome.required'           => 'Informe o Nível do Idioma',
            'sigla.required'          => 'Informe a Sigla para o Nível do Idioma',
            'descricao.required'      => 'Descrever as Características do Nível de Ensino do Idioma'
        ];

        $request->validate($rule, $feedback);

        //dd($request->all());

        Nivel::create($request->all());

        return redirect()->route('nivel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('app._config.nivel.create', [
            'nivel' => Nivel::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $nivel = Nivel::find($id);

        $rule = [
            'nome'        => "required|min:3|unique:nivels,nome,{$id},id",
            'sigla'       => "required|unique:nivels,sigla,{$id},id",
            'descricao'   => 'required'
        ];

        $feedback = [
            'nome.required'           => 'Informe o Nível do Idioma',
            'sigla.required'          => 'Informe a Sigla para o Nível do Idioma',
            'descricao.required'      => 'Descrever as Características do Nível de Ensino do Idioma'
        ];

        $request->validate($rule, $feedback);

        //dd($request->all());

        $nivel->update($request->all());

        return redirect()->route('nivel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
