<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Colaborador;
use App\Models\Genero;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.colaborador.index', [
            'colaboradores' => Colaborador::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.colaborador.create', [
            'generos'        => Genero::all(),
            'cargos'  => Cargo::orderBy('nome', 'asc')->get()
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

        $request['cep']                  = str_replace(['.', '-'], '', $request->input('cep'));
        $request['telefone']             = str_replace(['(', ')', '.', '-', ' '], '', $request->input('telefone'));
        $request['password']             = bcrypt(str_replace(['.', '-'], '', $request->input('data_nascimento')));
        $request['registro'] = '123A';

        $rule = [
            'name'                         => 'required|min:3',
            'data_nascimento'              => 'required',
            'genero_id'                    => 'required|exists:generos,id',
            'email'                        => 'required|unique:users',
            'cpf'                          => 'min:11|max:11|unique:users',
            'rg'                           => 'nullable',
            'telefone'                     => 'nullable',
            'cargo_id'                     => 'nullable|exists:cargos,id',
            'cep'                          => 'required',
            'logradouro'                   => 'required',
            'numero'                       => 'required',
            'complemento'                  => 'nullable',
            'bairro'                       => 'required',
            'municipio'                    => 'required',
            'estado'                       => 'required',
        ];

        $feedback = [
            'required'     => 'O campo :attribute é obrigatorio',
            'email.unique' => 'O e-mail informado já está cadastrado',
            'cpf.min'      => 'O campo CPF deve conter 11 caractéres',
            'cpf.max'      => 'O campo CPF deve conter 11 caractéres',
            'cpf.unique'   => 'O CPF informado já está cadastrado',
            'cargo_id.exists' => 'O cargo informado não está cadastrado'

        ];

        $request->validate($rule, $feedback);

        // dd($request->all());

        try {

            DB::beginTransaction();
            $usuario = User::create($request->all());
            $usuario->endereco()->create($request->all());
            $usuario->colaborador()->create($request->all());
            // $request['aluno_id'] = $aluno->id;

            DB::commit();
        } catch (\Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
            return redirect()->route('colaborador.create');
        }

        return redirect()->route('colaborador.index');
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
        $colaborador = Colaborador::find($id);

        $user = User::find($colaborador->user_id);

        return view('app.colaborador.create', [
            'generos'     => Genero::all(),
            'cargos'      => Cargo::orderBy('nome', 'asc')->get(),
            'user'        => $user,
            'colaborador' =>$colaborador
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colaborador $colaborador)
    {

        $user = User::find($colaborador->user_id);

       
        $request['cep']                  = str_replace(['.', '-'], '', $request->input('cep'));
        $request['telefone']             = str_replace(['(', ')', '.', '-', ' '], '', $request->input('telefone'));
        $request['password']             = bcrypt(str_replace(['.', '-'], '', $request->input('data_nascimento')));
        $request['registro'] = '123A';

        $rule = [
            'name'                         => 'required|min:3',
            'data_nascimento'              => 'required',
            'genero_id'                    => 'required|exists:generos,id',
            'email'                        => "required|email|unique:users,email,{$user->id},id",
            'cpf'                          => "nullable|min:11|max:11|unique:users,cpf,{$user->id},id",
            'rg'                           => 'nullable',
            'telefone'                     => 'nullable',
            'cargo_id'                     => 'nullable|exists:cargos,id',
            'cep'                          => 'required',
            'logradouro'                   => 'required',
            'numero'                       => 'required',
            'complemento'                  => 'nullable',
            'bairro'                       => 'required',
            'municipio'                    => 'required',
            'estado'                       => 'required',
        ];

        $feedback = [
            'required'     => 'O campo :attribute é obrigatorio',
            'email.unique' => 'O e-mail informado já está cadastrado',
            'cpf.min'      => 'O campo CPF deve conter 11 caractéres',
            'cpf.max'      => 'O campo CPF deve conter 11 caractéres',
            'cpf.unique'   => 'O CPF informado já está cadastrado',
            'cargo_id.exists' => 'O cargo informado não está cadastrado'

        ];

        $request->validate($rule, $feedback);

        // dd($request->all());

        try {

            DB::beginTransaction();
            $user->update($request->all());
            $user->endereco->update($request->all());
            $user->colaborador->update($request->all());
            // $request['aluno_id'] = $aluno->id;

            DB::commit();
        } catch (\Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
            return redirect()->route('colaborador.create');
        }

        return redirect()->route('colaborador.index');




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
