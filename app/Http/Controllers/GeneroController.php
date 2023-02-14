<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app._config.genero.index', [
            'generos' => Genero::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app._config.genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nome'   => 'required|min:3|unique:generos'
        ];

        $feedback = [
            'nome.required'  => 'Informe o nome do Gênero',
            'nome.min'       => 'Digite pelo menos 03 caractéres',
            'nome.unique'    => 'O Gênero informado já está cadastrado!'
        ];

        $request->validate($rules, $feedback);


        Genero::create($request->all());


        return redirect()->route('genero.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit(Genero $genero)
    {

        return view('app._config.genero.create', [
            'genero' => Genero::find($genero->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genero $genero)
    {

        $id = $genero->id;
        $rules = [
            'nome'   => "required|min:3|unique:generos,nome,{$id},id"
        ];

        $feedback = [
            'nome.required'  => 'Informe o nome do Gênero',
            'nome.min'       => 'Digite pelo menos 03 caractéres',
            'nome.unique'    => 'O Gênero informado já está cadastrado!'
        ];

        $request->validate($rules, $feedback);

        $genero->update($request->all());

        return redirect()->route('genero.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        //
    }
}
