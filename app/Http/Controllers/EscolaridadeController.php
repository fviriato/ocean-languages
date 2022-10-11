<?php

namespace App\Http\Controllers;

use App\Models\Escolaridade;
use Illuminate\Http\Request;

class EscolaridadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app._config.escolaridade.index', [
            'escolaridades' => Escolaridade::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app._config.escolaridade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rule = ['descricao' => 'required|unique:escolaridades'];

        $feedback = [
            'descricao.required' => 'Informe qual é a Escolaridade',
            'descricao.unique' => 'A Escolaridade informada já está cadastrada'
        ];

        $request->validate($rule, $feedback);

        Escolaridade::create($request->all());

        return redirect()->route('escolaridade.index');
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
    public function edit(Escolaridade $escolaridade)
    {

        return view('app._config.escolaridade.create', [
            'escolaridade' => Escolaridade::find($escolaridade->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escolaridade $escolaridade)
    {
        $id = $escolaridade->id;

        $rule = ['descricao' => "required|unique:escolaridades,descricao,{$id},id"];

        $feedback = [
            'descricao.required' => 'Informe qual é a Escolaridade',
            'descricao.unique' => 'A Escolaridade informada já está cadastrada'
        ];

        $request->validate($rule, $feedback);

        $escolaridade->update($request->all());

        return redirect()->route('escolaridade.index');
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
