<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estagio;
use App\Models\Disciplina;
use App\Models\Nivel;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('app.curso.index',[
            'cursos' => Curso::all() ?? ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.curso.create', [
            'idiomaDisciplinas' => Disciplina::where('tipo', 'idioma')->orderBy('nome')->get() ?? '',
            'estagios'          => Estagio::orderBy('nome')->get(),
            'niveis'            => Nivel::orderBy('nome')->get()
        ]);
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
            'nome'                  => 'required',
            'idioma_disciplina_id'  => 'required|exists:idioma_disciplinas,id',
            'estagio_id'            => 'required|exists:estagios,id',
            'nivel_id'              => 'required|exists:nivels,id'
        ];
        $feedback = [
            'nome.required'                  => 'Informe um Nome ou Identificação Deste Curso',
            'idioma_disciplina_id.required'  => 'Informar o Idioma',
            'idioma_disciplina_id.exists'    => 'Opção não encontrada',
            'estagio_id.required'            => 'Informar o Estágio do Idioma',
            'estagio_id.exists'              => 'Opção de Estágio não encontrada',
            'nivel_id.required'              => 'Informar o Nível do Idioma',
            'nivel_id.exists'                => 'Opção de Nível de Idioma não encontrada'
        ];

        $request->validate($rule, $feedback);

        Curso::create($request->all());

        return redirect()->route('curso.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $curso = Curso::find($id);


        return view('app.curso.create', [
            'idiomaDisciplinas' => Disciplina::where('tipo', 'idioma')->orderBy('nome')->get() ?? '',
            'estagios'          => Estagio::all(),
            'niveis'            => Nivel::all(),
            'curso'             =>  $curso
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {


        $rule = [
            'nome'                  => 'required',
            'idioma_disciplina_id'  => 'required|exists:idioma_disciplinas,id',
            'estagio_id'            => 'required|exists:estagios,id',
            'nivel_id'              => 'required|exists:nivels,id'
        ];
        $feedback = [
            'nome.required'                  => 'Informe um Nome ou Identificação Deste Curso',
            'idioma_disciplina_id.required'  => 'Informar o Idioma',
            'idioma_disciplina_id.exists'    => 'Opção não encontrada',
            'estagio_id.required'            => 'Informar o Estágio do Idioma',
            'estagio_id.exists'              => 'Opção de Estágio não encontrada',
            'nivel_id.required'              => 'Informar o Nível do Idioma',
            'nivel_id.exists'                => 'Opção de Nível de Idioma não encontrada'
        ];

        // dd($request->all());

        $request->validate($rule, $feedback);

        // $curso = new Curso();
        $curso->update($request->all());

        return redirect()->route('curso.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }
}
