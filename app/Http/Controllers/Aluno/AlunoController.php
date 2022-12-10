<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlunoStoreUpdateRequest;
use App\Http\Requests\EnderecoStoreUpdateRequest;
use App\Http\Requests\ResponsavelAlunoStoreUpdateRequest;
use App\Http\Requests\UserStoreUpdateRequest;
use App\Models\Aluno;
use App\Models\Endereco;
use App\Models\Escola;
use App\Models\Escolaridade;
use App\Models\Genero;
use App\Models\Responsavel;
use App\Models\User;
use Carbon\Carbon;
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
            'alunos' => Aluno::paginate(10)
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
            'escolas' => Escola::all(),
            'escolaridades' => Escolaridade::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        UserStoreUpdateRequest $user,
        EnderecoStoreUpdateRequest $endereco,
        AlunoStoreUpdateRequest $aluno,
        ResponsavelAlunoStoreUpdateRequest $responsavel
    ) {

        //Cadastrar usuário
        $user['password'] = bcrypt(str_replace(['.', '-'], '', $request->data_nascimento));
        $userId = User::create($user->all())->id;

        //Cadastrar endereço do usuário
        $endereco['user_id'] = $userId;
        Endereco::create($endereco->all());

        //Cadastrar aluno
        $aluno['user_id'] = $userId;
        $alunoId = Aluno::create($aluno->all())->id;

        $idadeAluno = date('Y') - date('Y', strtotime($request->data_nascimento));

        if ($idadeAluno < 18) {
            $responsavel['aluno_id'] = $alunoId;
            Responsavel::create($responsavel->all());
        }

        return redirect()->route('aluno.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {

        // dd($aluno);

        return view('app.aluno.create', [
            'generos'       => Genero::all(),
            'escolas'       => Escola::all(),
            'escolaridades' => Escolaridade::all(),
            'user'         => User::find($aluno->user_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(
        $id,
        Request $request
        // UserStoreUpdateRequest $user,
        // EnderecoStoreUpdateRequest $endereco,
        // AlunoStoreUpdateRequest $aluno,
        // ResponsavelAlunoStoreUpdateRequest $responsavel       
    ) {

        $usuario = User::find($id);
        $usuario->update($request->all());
        $usuario->endereco->update($request->all());
        $usuario->aluno->update($request->all());

        $idade = date('Y') - date('Y', strtotime($request->data_nascimento));

        if ($idade < 18) {
            // dd($request->all());
            $usuario->aluno->responsavel->update($request->all());
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
