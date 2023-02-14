<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Curso;
use App\Models\Estagio;
use App\Models\Disciplina;
use App\Models\Nivel;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.turma.index', [
            'turmas' => Turma::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.turma.create', [
            'idiomas'        => Disciplina::where('tipo', 'idioma')->orderBy('nome')->get(),
            'estagios'       => Estagio::all(),
            'niveis'         => Nivel::all(),
            'professores'    => ''
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
        // dd($request->all());

        $rule = [
            'nome'                      => 'required',
            'idioma_disciplina_id'      => 'required|exists:idioma_disciplinas,id',
            'estagio_id'                => 'required|exists:estagios,id',
            'nivel_id'                  => 'required|exists:nivels,id',
            'modalidade'                => 'required',
            'tipo'                      => 'required',
            'colaborador_id'            => 'required|exists:users,id',
            'data_inicio'               => 'required',
            'data_fim'                  => 'required',
            'primeiro_dia_semana'       => 'required',
            'hora_inicio'               => 'required',
            'hora_fim'                  => 'required',

        ];

        $feedback = [
            'nome.required'                 => 'Informe um nome para a Turma',
            'required'                      => 'O campo :attribute é obrigatorio',
            'idioma_disciplina_id.exists'   => 'O Curso Informado não está cadastrado!',
            'tipo.required'                 => 'Informar se é Individual ou Grupo',
            'colaborador_id.exists'         => 'O Colaborador Informado não está cadastrado!',
        ];

        $request->validate($rule, $feedback);

        try {

            DB::beginTransaction();

            $curso = Curso::create($request->all());
            $user = User::find($request->input('colaborador_id'))->id;
            $colaborador = Colaborador::where('user_id', $user)->get();

            $turma = new Turma();

            $request['curso_id'] = $curso->id;
            $request['colaborador_id'] = $colaborador[0]->id;
            $turma->create($request->all());


            DB::commit();
        } catch (\Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
            return redirect()->route('turma.create');
        }

        return redirect()->route('turma.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function show(Turma $turma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function edit(Turma $turma)
    {
    
        return view('app.turma.create', [
            'idiomas'        => Disciplina::where('tipo', 'idioma')->orderBy('nome')->get(),
            'estagios'       => Estagio::all(),
            'niveis'         => Nivel::all(),
            'professores'    => User::where('tipo', 'professor')->get(),
            'turma'          => $turma
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turma $turma)
    {
        $rule = [
            'nome'                      => 'required',
            'idioma_disciplina_id'      => 'required|exists:idioma_disciplinas,id',
            'estagio_id'                => 'required|exists:estagios,id',
            'nivel_id'                  => 'required|exists:nivels,id',
            'modalidade'                => 'required',
            'tipo'                      => 'required',
            'colaborador_id'            => 'required|exists:users,id',
            'data_inicio'               => 'required',
            'data_fim'                  => 'required',
            'primeiro_dia_semana'       => 'required',
            'hora_inicio'               => 'required',
            'hora_fim'                  => 'required',

        ];

        $feedback = [
            'nome.required'                 => 'Informe um nome para a Turma',
            'required'                      => 'O campo :attribute é obrigatorio',
            'idioma_disciplina_id.exists'   => 'O Curso Informado não está cadastrado!',
            'tipo.required'                 => 'Informar se é Individual ou Grupo',
            'colaborador_id.exists'         => 'O Colaborador Informado não está cadastrado!',
        ];

        $request->validate($rule, $feedback);

        try {

            DB::beginTransaction();

            $turma->curso->update($request->all());

            // $curso = new Curso();

            // $curso->update($request->all());

            $user = User::find($request->input('colaborador_id'))->id;
            $colaborador = Colaborador::where('user_id', $user)->get();

            // $turma = new Turma();

            $request['curso_id'] = $turma->curso_id;
            $request['colaborador_id'] = $colaborador[0]->id;
            $turma->update($request->all());


            DB::commit();
        } catch (\Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
            return redirect()->route('turma.create');
        }

        return redirect()->route('turma.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turma $turma)
    {
        //
    }
}
