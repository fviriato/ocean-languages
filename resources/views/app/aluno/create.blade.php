@extends('home')

@section('titulo', 'Cadastrar Aluno')

@section('content_header')

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Cadastro de Aluno</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('aluno.index') }}">Voltar</a>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="row" style="padding-top: 10px;padding-bottom: -30px">
                        <div class="col-sm-11 container-fluid">
                            <ul class="alert alert-default-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                @foreach ($errors->all() as $error)
                                    <li class="error">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if (!empty($user->id))
                    <form method="POST" action="{{ route('aluno.update', ['aluno' => $user->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('aluno.store') }}" enctype="multipart/form-data">
                @endif


                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name">Nome Completo</label>
                            <input type="text" name="name" class="form-control form-control-sm" id="name"
                                placeholder="Nome Completo do Aluno" value="{{ $user->name ?? old('name') }}">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="data_nascimento">Data Nascimento</label>
                            <input type="date" name="data_nascimento" class="form-control form-control-sm"
                                id="data_nascimento" value="{{ $user->data_nascimento ?? old('data_nascimento') }}">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="genero_id">Gênero</label>
                            <select name="genero_id" class="form-control form-control-sm" id="genero_id">
                                <option></option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->id }}"
                                        {{ ($user->genero_id ?? old('genero_id')) == $genero->id ? 'selected' : '' }}>
                                        {{ $genero->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control form-control-sm" id="email"
                                value="{{ $user->email ?? old('email') }}" placeholder="E-mail do Aluno">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control form-control-sm cpf" id="cpf"
                                value="{{ $user->cpf ?? old('cpf') }}" placeholder="CPF do Aluno" maxlength="11">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="rg">RG</label>
                            <input type="text" name="rg" class="form-control form-control-sm" id="rg"
                                value="{{ $user->rg ?? old('rg') }}" placeholder="RG do Aluno" maxlength="14">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" class="form-control form-control-sm telefone"
                                id="telefone" value="{{ $user->telefone ?? old('telefone') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" class="form-control form-control-sm cep" id="cep"
                                value="{{ $user->endereco->cep ?? old('cep') }}" placeholder="CEP" maxlength="8">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="logradouro">Endereço</label>
                            <input type="text" name="logradouro" class="form-control form-control-sm" id="logradouro"
                                value="{{ $user->endereco->logradouro ?? old('logradouro') }}" placeholder="Logradouro">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="numero">Número</label>
                            <input type="text" name="numero" class="form-control form-control-sm" id="numero"
                                value="{{ $user->endereco->numero ?? old('numero') }}" placeholder="Ex. 45B">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="complemento">Complemento</label>
                            <input type="text" name="complemento" class="form-control form-control-sm"
                                id="complemento" value="{{ $user->endereco->complemento ?? old('complemento') }}"
                                placeholder="Ex. Fundos">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-5">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" class="form-control form-control-sm" id="bairro"
                                value="{{ $user->endereco->bairro ?? old('bairro') }}" placeholder="Ex. Alto da Lapa">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="municipio">Município</label>
                            <input type="text" name="municipio" class="form-control form-control-sm" id="municipio"
                                value="{{ $user->endereco->municipio ?? old('municipio') }}"
                                placeholder="Ex. Mogi das Cruzes">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" class="form-control form-control-sm" id="estado"
                                value="{{ $user->endereco->estado ?? old('estado') }}" placeholder="Ex. São Paulo">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="escola_id">Escola</label>
                            <select name="escola_id" class="form-control form-control-sm" id="escola_id">
                                <option></option>
                                @foreach ($escolas as $escola)
                                    <option value="{{ $escola->id }}"
                                        {{ ($user->aluno->escola_id ?? old('escola_id')) == $escola->id ? 'selected' : '' }}>
                                        {{ $escola->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="escolaridade_id">Escolaridade</label>
                            <select name="escolaridade_id" class="form-control form-control-sm" id="escolaridade_id">
                                <option></option>
                                @foreach ($escolaridades as $escolaridade)
                                    <option value="{{ $escolaridade->id }}"
                                        {{ ($user->aluno->escolaridade_id ?? old('escolaridade_id')) == $escolaridade->id ? 'selected' : '' }}>
                                        {{ $escolaridade->descricao }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="profissao">Profissão</label>
                            <input type="text" name="profissao" class="form-control form-control-sm" id="profissao"
                                value="{{ $user->aluno->profissao ?? old('profissao') }}" placeholder="Ex. Engenheiro">
                        </div>

                        <div class="form-group  col-sm-4">
                            <input type="hidden" name="password"
                                value="{{ bcrypt(str_replace(['.', '-'], '', $user->data_nascimento ?? old('data_nascimento'))) }}">
                        </div>
                        <div class="form-group  col-sm-2">
                            <input type="hidden" name="tipo" value="aluno">
                        </div>

                    </div>


                    {{-- <div class="row">
                        <div class="form-group  col-sm-4">
                            <label class="" for="foto">Foto do Aluno</label>
                            <input type="file" class="form-control-file" name="foto" id="foto" value="{{ $user->foto ?? old('foto') }}">
                        </div>
                    </div> --}}

                    <hr>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="responsavel_nome">Nome Completo do Responsável</label>
                            <input type="text" name="responsavel_nome" class="form-control form-control-sm"
                                id="responsavel_nome" placeholder="Nome Completo do Responsável"
                                value="{{ $responsavel->user->name ?? old('responsavel_nome') }}">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="responsavel_data_nascimento">Data Nascimento</label>
                            <input type="date" name="responsavel_data_nascimento" class="form-control form-control-sm"
                                id="responsavel_data_nascimento"
                                value="{{ $responsavel->user->data_nascimento ?? old('responsavel_data_nascimento') }}">
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="responsavel_email">E-mail do Responsável</label>
                            <input type="email" name="responsavel_email" class="form-control form-control-sm"
                                id="responsavel_email"
                                value="{{ $responsavel->user->email ?? old('responsavel_email') }}"
                                placeholder="E-mail do Responsável">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="responsavel_cpf">CPF do Responsável</label>
                            <input type="text" name="responsavel_cpf" class="form-control form-control-sm cpf"
                                id="responsavel_cpf" value="{{ $responsavel->user->cpf ?? old('responsavel_cpf') }}"
                                placeholder="CPF do Responsável" maxlength="11">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="responsavel_rg">RG do Responsável</label>
                            <input type="text" name="responsavel_rg" class="form-control form-control-sm"
                                id="responsavel_rg" value="{{ $responsavel->user->rg ?? old('responsavel_rg') }}"
                                placeholder="RG do Responsável" maxlength="14">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="responsavel_telefone">Telefone do Resp.</label>
                            <input type="text" name="responsavel_telefone"
                                class="form-control form-control-sm telefone" id="responsavel_telefone"
                                value="{{ $responsavel->user->telefone ?? old('responsavel_telefone') }}">
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-sm-6">
                            <label for="responsavel_escolaridade_id">Escolaridade</label>
                            <select name="responsavel_escolaridade_id" class="form-control form-control-sm"
                                id="responsavel_escolaridade_id">
                                <option></option>
                                @foreach ($escolaridades as $escolaridade)
                                    <option value="{{ $escolaridade->id }}"
                                        {{ ($responsavel->escolaridade_id ?? old('responsavel_escolaridade_id')) == $escolaridade->id ? 'selected' : '' }}>
                                        {{ $escolaridade->descricao }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="responsavel_profissao">Profissão</label>
                            <input type="text" name="responsavel_profissao" class="form-control form-control-sm"
                                id="responsavel_profissao" placeholder="Profissão"
                                value="{{ $responsavel->profissao ?? old('responsavel_profissao') }}">
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="endereco_aluno">Usar Mesmo Endereço do Aluno</label>
                            <input type="checkbox" name="endereco_aluno" id="endereco_aluno"
                                value="{{ $responsavel->responsavel_endereco_aluno ?? old('endereco_aluno') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="responsavel_cep">CEP</label>
                            <input type="text" name="responsavel_cep" class="form-control form-control-sm cep"
                                id="responsavel_cep"
                                value="{{ $responsavel->user->endereco->cep ?? old('responsavel_cep') }}"
                                placeholder="CEP" maxlength="8">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="responsavel_logradouro">Endereço</label>
                            <input type="text" name="responsavel_logradouro" class="form-control form-control-sm"
                                id="responsavel_logradouro"
                                value="{{ $responsavel->user->endereco->logradouro ?? old('responsavel_logradouro') }}"
                                placeholder="Logradouro">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="responsavel_numero">Número</label>
                            <input type="text" name="responsavel_numero" class="form-control form-control-sm"
                                id="responsavel_numero"
                                value="{{ $responsavel->user->endereco->numero ?? old('responsavel_numero') }}"
                                placeholder="Ex. 45B">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="responsavel_complemento">Complemento</label>
                            <input type="text" name="responsavel_complemento" class="form-control form-control-sm"
                                id="responsavel_complemento"
                                value="{{ $responsavel->user->endereco->complemento ?? old('responsavel_complemento') }}"
                                placeholder="Ex. Fundos">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-5">
                            <label for="responsavel_bairro">Bairro</label>
                            <input type="text" name="responsavel_bairro" class="form-control form-control-sm"
                                id="responsavel_bairro"
                                value="{{ $responsavel->user->endereco->bairro ?? old('responsavel_bairro') }}"
                                placeholder="Ex. Alto da Lapa">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="responsavel_municipio">Município</label>
                            <input type="text" name="responsavel_municipio" class="form-control form-control-sm"
                                id="responsavel_municipio"
                                value="{{ $responsavel->user->endereco->municipio ?? old('responsavel_municipio') }}"
                                placeholder="Ex. Mogi das Cruzes">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="responsavel_estado">Estado</label>
                            <input type="text" name="responsavel_estado" class="form-control form-control-sm"
                                id="responsavel_estado"
                                value="{{ $responsavel->user->endereco->estado ?? old('responsavel_estado') }}"
                                placeholder="Ex. São Paulo">
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ isset($user->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/aluno/aluno.create.js') }}"></script>

@endsection
