<?php

namespace App\Http\Controllers;

use App\Http\Requests\Aluno\AlunoRequest;
use App\Models\Aluno;
use App\Models\Endereco;
use App\Models\Escola;
use App\Models\Escolaridade;
use App\Models\Genero;
use App\Models\Responsavel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a home page of alunos.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('app.aluno.home');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::with(['user'])->paginate(10);
        return view('app.aluno.index', [
            'alunos' => $alunos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('app.aluno.create', [
            'generos'       => Genero::all(),
            'escolas'       => Escola::all(),
            'escolaridades' => Escolaridade::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        // dd($request->all());

        DB::beginTransaction();
        $usuario = User::create($request->all());
        $usuario->endereco()->create($request->all());

        $request['matricula'] = '20230001';

        $usuario->aluno()->create($request->all());

        $idadeAluno = date('Y') - date('Y', strtotime($request->data_nascimento));

        if ($idadeAluno  < 18) {

            $user = new User();
            $user->name            = $request->responsavel_nome;
            $user->data_nascimento = $request->responsavel_data_nascimento;
            $user->genero_id       = $request->genero_id;
            $user->email           = $request->responsavel_email;
            $user->password        = bcrypt(str_replace(['.', '-'], '', $request->data_nascimento));
            $user->cpf             = $request->responsavel_cpf;
            $user->rg              = $request->responsavel_rg;
            $user->telefone        = $request->responsavel_telefone;
            $user->tipo = 'responsavel_aluno';
            $user->save();

            $userEndereco = new Endereco();
            $userEndereco->user_id     = $user->id;
            $userEndereco->cep         = $request->responsavel_cep;
            $userEndereco->logradouro  = $request->responsavel_logradouro;
            $userEndereco->numero      = $request->responsavel_numero;
            $userEndereco->complemento = $request->responsavel_complemento;
            $userEndereco->bairro      = $request->responsavel_bairro;
            $userEndereco->municipio   = $request->responsavel_municipio;
            $userEndereco->estado      = $request->responsavel_estado;
            $userEndereco->save();

            $responsavel = new Responsavel();

            $responsavel->aluno_id        =  $usuario->aluno->id;
            $responsavel->escolaridade_id =  $user->escolaridade_id ;
            $responsavel->profissao       =  $user->profissao;
            $responsavel->save();


        }

        DB::commit();

        dd($request->all());
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
        //
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
        //
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
