<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Colaborador\ColaboradorRequest;
use App\Http\Requests\Endereco\EnderecoRequest;
use App\Http\Requests\User\UserRequest;
use App\Models\Colaborador;
use App\Models\ColaboradorDisciplina;
use App\Models\Disciplina;
use App\Models\Genero;
use App\Models\User;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function home()
    {
        return view('app.professor.home');
    }


    public function materias($id)
    {

        return view('app.professor.materias.create', [
            'materias' => Disciplina::all(),
            'materiasProfessor' => ColaboradorDisciplina::where('colaborador_id', $id)->get(),
            'colaborador' => Colaborador::find($id)
        ]);
    }



    public function cadastrar(Request $request)
    {
        $dados = $request->all();
        $dados['data_cadastro'] = date('Y-m-d', strtotime(now()));

        $rule = [
            'disciplina_id' => 'required|exists:disciplinas,id',
            'colaborador_id' => 'required'
        ];

        $feedback = [
            'disciplina_id.required' => 'Selecionar a matéria',
            'colaborador_id.required' => 'Informar o professor'

        ];

        $request->validate($rule, $feedback);

        ColaboradorDisciplina::create($dados);

        return view('app.professor.materias.create', [
            'materias' => Disciplina::all(),
            'materiasProfessor' => ColaboradorDisciplina::where('colaborador_id', $request->colaborador_id)->get(),
            'colaborador' => Colaborador::find($request->colaborador_id)
        ]);
    }




    public function deletarMateria(Request $request, $idMateria, $colaborador)
    {

        $disciplina = ColaboradorDisciplina::find($idMateria);

        $disciplina->delete();


        return view('app.professor.materias.create', [
            'materias' => Disciplina::all(),
            'materiasProfessor' => ColaboradorDisciplina::where('colaborador_id', $colaborador)->get(),
            'colaborador' => Colaborador::find($colaborador)
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $colaboradores = Colaborador::all();

        return view('app.professor.index', [
            'colaboradores' => Colaborador::with(['user'])->paginate(10)

            // 'colaboradores' => $colaboradores->load(['user' => function ($query) {
            //     $query->orderByDesc('name');
            // }])->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.professor.create', [
            'generos' => Genero::all(),
            'materias' => Disciplina::where('tipo', 'idioma')->orderBy('nome')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        // dd($request->all());


        DB::beginTransaction();

        $usuario = User::create($request->all());
        $usuario->endereco()->create($request->all());

        $prof = new Colaborador();
        $request['registro'] =  $prof->registroProfessor();
        $usuario->colaborador()->create($request->all());

        DB::commit();

        return redirect()->route('professor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show($professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professor = Colaborador::find($id);
        $user = User::where('id', $professor->user_id)->first();
        return view('app.professor.create', [
            'professor' => $professor,
            'generos'       => Genero::all(),
            'user'          => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $professor = Colaborador::where('user_id', $user->id)->first();

        DB::beginTransaction();

        $user->update($request->all());
        $user->endereco->update($request->all());
        $user->colaborador->update($request->all());

        DB::commit();

        // dd($professor);


        return redirect()->route('professor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy($professor)
    {
        //
    }
}
