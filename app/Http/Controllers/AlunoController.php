<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Escola;
use App\Models\Escolaridade;
use App\Models\Genero;
use App\Models\Responsavel;
use App\Models\User;
use Error;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class AlunoController extends Controller
{


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
        return view('app.aluno.index', [
            'usuarios'    => User::where('tipo', 'aluno')->orderBy('name')->get(),
            'responsavel' => Responsavel::all()
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
            'generos' => Genero::all(),
            'escolas' => Escola::orderBy('nome')->get(),
            'escolaridades' => Escolaridade::all()
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

        $request['cpf']                  = str_replace(['.', '-'], '', $request->input('cpf'));
        $request['rg']                   = str_replace(['.', '-'], '', $request->input('rg'));
        $request['cep']                  = str_replace(['.', '-'], '', $request->input('cep'));
        $request['telefone']             = str_replace(['(', ')', '.', '-', ' '], '', $request->input('telefone'));
        $request['responsavel_cpf']      = str_replace(['.', '-'], '', $request->input('responsavel_cpf'));
        $request['responsavel_rg']       = str_replace(['.', '-'], '', $request->input('responsavel_rg'));
        $request['responsavel_telefone'] = str_replace(['(', ')', '.', '-', ' '], '', $request->input('responsavel_telefone'));
        $request['responsavel_cep']      = str_replace(['.', '-'], '', $request->input('responsavel_cep'));
        $request['password']             = bcrypt(str_replace(['.', '-'], '', $request->input('data_nascimento')));
        $request['tipo'] = 'aluno';
        $request['matricula'] = '123A';

        $idadeAluno = date('Y') - date('Y', strtotime($request->input('data_nascimento')));

        $rule = [
            'name'                         => 'required|min:3',
            'data_nascimento'              => 'required',
            'genero_id'                    => 'required|exists:generos,id',
            'email'                        => 'required|unique:users',
            'cpf'                          => 'min:11|max:11|unique:users',
            'rg'                           => 'nullable',
            'telefone'                     => 'nullable',
            'cep'                          => 'required',
            'logradouro'                   => 'required',
            'numero'                       => 'required',
            'complemento'                  => 'nullable',
            'bairro'                       => 'required',
            'municipio'                    => 'required',
            'estado'                       => 'required',
            'escola_id'                    => 'required|exists:escolas,id',
            'escolaridade_id'              => 'required|exists:escolaridades,id',
        ];

        $feedback = [
            'required'     => 'O campo :attribute é obrigatorio',
            'email.unique' => 'O e-mail informado já está cadastrado',
            'cpf.min'      => 'O campo CPF deve conter 11 caractéres',
            'cpf.max'      => 'O campo CPF deve conter 11 caractéres',
            'cpf.unique'   => 'O CPF informado já está cadastrado',

        ];

        $request->validate($rule, $feedback);

        if ($idadeAluno < 18) {

            $ruleResp = [
                'responsavel_nome'             => 'required',
                'responsavel_data_nascimento'  => 'required',
                'responsavel_email'            => 'required',
                'responsavel_cpf'              => 'required|min:11|max:11|unique:responsavels',
                'responsavel_rg'               => 'nullable',
                'responsavel_telefone'         => 'required',
                'responsavel_escola_id'        => 'nullable|exists:escolas,id',
                'responsavel_escolaridade_id'  => 'nullable|exists:escolaridades,id',
                'responsavel_cep'              => 'required',
                'responsavel_logradouro'       => 'required',
                'responsavel_numero'           => 'required',
                'responsavel_complemento'      => 'nullable',
                'responsavel_bairro'           => 'required',
                'responsavel_municipio'        => 'required',
                'responsavel_estado'           => 'required',
            ];

            $feedbackResp = [
                'required'     => 'O campo :attribute é obrigatorio',
                'email.unique' => 'O e-mail informado já está cadastrado',
                'responsavel_cpf.min'      => 'O campo CPF deve conter 11 caractéres',
                'responsavel_cpf.max'      => 'O campo CPF deve conter 11 caractéres',
                'responsavel_cpf.unique'   => 'O CPF informado já está cadastrado',

            ];

            $request->validate($ruleResp, $feedbackResp);
        }


        try {

            DB::beginTransaction();
            $usuario = User::create($request->all());
            $usuario->endereco()->create($request->all());
            $aluno = $usuario->aluno()->create($request->all());
            $request['aluno_id'] = $aluno->id;

            if ($idadeAluno < 18) {
                Responsavel::create($request->all());
            }

            DB::commit();
        } catch (\Exception $exception) {

            DB::rollBack();
            // return $exception->getMessage();
            return redirect()->route('aluno.create');
        }

        return redirect()->route('aluno.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(User $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $aluno = Aluno::where('user_id', $user->id)->get();
        $responsavel =  Responsavel::where('aluno_id', $aluno[0]->id)->get();

        return view('app.aluno.create', [
            'generos'       => Genero::all(),
            'escolas'       => Escola::orderBy('nome')->get(),
            'escolaridades' => Escolaridade::all(),
            'aluno'         => $user,
            'responsavel'   => $responsavel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $idUsuario = $user->id;
        $aluno = Aluno::where('user_id', $user->id)->get();
        $responsavel =  Responsavel::where('aluno_id', $aluno[0]->id)->get();


        $request['cpf']                  = str_replace(['.', '-'], '', $request->input('cpf'));
        $request['rg']                   = str_replace(['.', '-'], '', $request->input('rg'));
        $request['cep']                  = str_replace(['.', '-'], '', $request->input('cep'));
        $request['telefone']             = str_replace(['(', ')', '.', '-', ' '], '', $request->input('telefone'));
        $request['responsavel_cpf']      = str_replace(['.', '-'], '', $request->input('responsavel_cpf'));
        $request['responsavel_rg']       = str_replace(['.', '-'], '', $request->input('responsavel_rg'));
        $request['responsavel_telefone'] = str_replace(['(', ')', '.', '-', ' '], '', $request->input('responsavel_telefone'));
        $request['responsavel_cep']      = str_replace(['.', '-'], '', $request->input('responsavel_cep'));
        $request['password']             = bcrypt(str_replace(['.', '-'], '', $request->input('data_nascimento')));
        $request['tipo'] = 'aluno';
        $request['matricula'] = '123A';

        $idadeAluno = date('Y') - date('Y', strtotime($request->input('data_nascimento')));

        $rule = [
            'name'                         => 'required|min:3',
            'data_nascimento'              => 'required',
            'genero_id'                    => 'required|exists:generos,id',
            'email'                        => "nullable|unique:users,email,{$idUsuario},id",
            'cpf'                          => "nullable|min:11|max:11|unique:users,cpf,{$idUsuario},id",
            'rg'                           => 'nullable',
            'telefone'                     => 'nullable',
            'cep'                          => 'required',
            'logradouro'                   => 'required',
            'numero'                       => 'required',
            'complemento'                  => 'nullable',
            'bairro'                       => 'required',
            'municipio'                    => 'required',
            'estado'                       => 'required',
            'escola_id'                    => 'required|exists:escolas,id',
            'escolaridade_id'              => 'required|exists:escolaridades,id',
        ];

        $feedback = [
            'required'     => 'O campo :attribute é obrigatorio',
            'email.unique' => 'O e-mail informado já está cadastrado',
            'cpf.min'      => 'O campo CPF deve conter 11 caractéres',
            'cpf.max'      => 'O campo CPF deve conter 11 caractéres',
            'cpf.unique'   => "O CPF informado já está cadastrado",

        ];

        $request->validate($rule, $feedback);

        if ($idadeAluno < 18) {

            $ruleResp = [
                'responsavel_nome'             => 'required',
                'responsavel_data_nascimento'  => 'required',
                'responsavel_email'            => 'required',
                'responsavel_cpf'              => "required|min:11|max:11|unique:responsavels,responsavel_cpf,{$responsavel[0]->id},id",
                'responsavel_rg'               => 'nullable',
                'responsavel_telefone'         => 'required',
                'responsavel_escola_id'        => 'nullable|exists:escolas,id',
                'responsavel_escolaridade_id'  => 'nullable|exists:escolaridades,id',
                'responsavel_cep'              => 'required',
                'responsavel_logradouro'       => 'required',
                'responsavel_numero'           => 'required',
                'responsavel_complemento'      => 'nullable',
                'responsavel_bairro'           => 'required',
                'responsavel_municipio'        => 'required',
                'responsavel_estado'           => 'required',
            ];

            $feedbackResp = [
                'required'     => 'O campo :attribute é obrigatorio',
                'responsavel_email.unique' => 'O e-mail informado do responsável já está cadastrado',
                'responsavel_cpf.min'      => 'O campo CPF deve conter 11 caractéres',
                'responsavel_cpf.max'      => 'O campo CPF deve conter 11 caractéres',
                'responsavel_cpf.unique'   => 'O CPFrrrr informado já está cadastrado',

            ];

            $request->validate($ruleResp, $feedbackResp);
        }


        try {

            DB::beginTransaction();

            $user->update($request->all());
            $user->endereco->update($request->all());
            $user->aluno->update($request->all());
            $request['aluno_id'] = $aluno[0]->id;
            
            if ($idadeAluno < 18) {

                $user->aluno->responsavel->update($request->all());

            }

            DB::commit();
        } catch (\Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
            return redirect()->route('aluno.create');
        }

        return redirect()->route('aluno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy($aluno)
    {
        //
    }
}
