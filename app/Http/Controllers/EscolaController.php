<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use Illuminate\Http\Request;

class EscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app._config.escola.index', [
            'escolas' => Escola::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app._config.escola.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rule = ['nome' => 'required|unique:escolas'];

        $feedback = [
            'nome.required' => 'Informe o nome da Escola ou Colégio',
            'nome.unique' => 'A Escola informada já está cadastrada'
        ];

        $request->validate($rule, $feedback);

        Escola::create($request->all());

        return redirect()->route('escola.index');
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
    public function edit(Escola $escola)
    {

        return view('app._config.escola.create', [
            'escola' => Escola::find($escola->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escola $escola)
    {
        
        $id = $escola->id;
        $rule = [
            'nome' => "required|unique:escolas,nome,{$id},id"
        ];

        $feedback = [
            'nome.required' => 'Informe o nome da Escola ou Colégio',
            'nome.unique' => 'A Escola informada já está cadastrada'
        ];

        $request->validate($rule, $feedback);

        $escola->update($request->all());

        return redirect()->route('escola.index');
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
