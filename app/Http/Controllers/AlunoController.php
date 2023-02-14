<?php

namespace App\Http\Controllers;

use App\Http\Requests\Aluno\AlunoRequest;
use App\Models\Aluno;
use App\Models\Endereco;
use App\Models\Escola;
use App\Models\Escolaridade;
use App\Models\Genero;
use App\Models\Responsavel;
use App\Models\Turma;
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

        // dd($request->foto);

        $al = new Aluno();

        if ($request->foto) {

            $request['foto'] = $request->foto->store(public_path('users'));

            // dd($request['foto']);

        }

        DB::beginTransaction();

        $usuario = User::create($request->all());
        $usuario->endereco()->create($request->all());
        $request['matricula'] =  $al->gerarMatriculaAluno(); //'20230001';
        $usuario->aluno()->create($request->all());

        $idadeAluno = date('Y') - date('Y', strtotime($request->data_nascimento));

        if ($idadeAluno  < 18) {

            //Verificar se o responsável já é responsável por outro aluno(a)
            $user = new User();

            $respJaCad = $user->where('email', $request->responsavel_email)->first();

            // dd($respJaCad->id);


            if (!$respJaCad) {

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

                //Cadastrar endereço do responsável
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
            }

            $responsavel = new Responsavel();
            $responsavel->aluno_id        =  $usuario->aluno->id;
            $responsavel->user_id         =  $user->id ?? $respJaCad->id;
            $responsavel->escolaridade_id =  $request->responsavel_escolaridade_id;
            $responsavel->profissao       =  $request->responsavel_profissao;
            $responsavel->save();
        }

        DB::commit();

        return view('app.aluno.index', [
            'alunos' => Aluno::with(['user'])->paginate(10)
        ]);
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
        $aluno = Aluno::find($id);
        $user = User::find($aluno->user_id);
        $responsavel = Responsavel::where('aluno_id', $aluno->id)->first();

        // dd($user->name, $responsavel->user->name);

        return view('app.aluno.create', [
            'generos'       => Genero::all(),
            'escolas'       => Escola::all(),
            'escolaridades' => Escolaridade::all(),
            'user'          => $user,
            'responsavel'    => $responsavel ?? ''
        ]);
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

        // dd($request->all());

        $user = User::find($id);
        $aluno = Aluno::where('user_id', $user->id)->first();
        $responsavel = Responsavel::where('aluno_id', $aluno->id)->first();

        // dd($endResponsavel);

        DB::beginTransaction();

        $user->update($request->all());
        $user->endereco->update($request->except(['_method', '_token']));
        $user->aluno->update($request->all());

        if ($responsavel) {

            $userResponsavel = User::where('id', $responsavel->user_id)->first();

            // $userResponsavel = new User();
            $userResponsavel->name            = $request->responsavel_nome;
            $userResponsavel->data_nascimento = $request->responsavel_data_nascimento;
            $userResponsavel->genero_id       = $request->genero_id;
            $userResponsavel->email           = $request->responsavel_email;
            $userResponsavel->cpf             = $request->responsavel_cpf;
            $userResponsavel->rg              = $request->responsavel_rg;
            $userResponsavel->telefone        = $request->responsavel_telefone;
            $userResponsavel->tipo            = 'responsavel_aluno';
            $userResponsavel->update();


            $endResponsavel = Endereco::where('user_id', $userResponsavel->id)->first();
            // $userEndereco = new Endereco();
            $endResponsavel->user_id     = $userResponsavel->id;
            $endResponsavel->cep         = $request->responsavel_cep;
            $endResponsavel->logradouro  = $request->responsavel_logradouro;
            $endResponsavel->numero      = $request->responsavel_numero;
            $endResponsavel->complemento = $request->responsavel_complemento;
            $endResponsavel->bairro      = $request->responsavel_bairro;
            $endResponsavel->municipio   = $request->responsavel_municipio;
            $endResponsavel->estado      = $request->responsavel_estado;
            $endResponsavel->update();

            // dd($userEndereco);

            $responsavel->user_id         =  $userResponsavel->id;
            $responsavel->escolaridade_id =  $request->responsavel_escolaridade_id;
            $responsavel->profissao       =  $request->responsavel_profissao;
            $responsavel->update();
        }


        DB::commit();

        return view('app.aluno.index', [
            'alunos' => Aluno::with(['user'])->paginate(10)
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function matricular(Request $request, $id)
    {

        return view('app.aluno.matricular', [
            'alunos'  => Aluno::with('user')->get()->sortBy('user.name'),
            'turmas'  => Turma::all()
        ]);
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
