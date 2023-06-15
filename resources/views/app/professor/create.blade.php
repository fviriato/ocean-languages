@extends('home')

@section('titulo', 'Cadastrar Professor')

@section('content_header')

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Cadastro de Professores</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('professor.home') }}">Voltar</a>
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
                    <form method="POST" action="{{ route('professor.update', ['professor' => $user->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('professor.store') }}">
                @endif

                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name">Nome Completo</label>
                            <input type="text" name="name" class="form-control form-control-sm" id="name"
                                placeholder="Nome Completo do Professor" value="{{ $user->name ?? old('name') }}">
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
                        <div class="form-group col-sm-3">
                            <label for="rg">RG</label>
                            <input type="text" name="rg" class="form-control form-control-sm rg" id="rg"
                                value="{{ $user->rg ?? old('rg') }}" placeholder="RG do Professor" maxlength="11">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control form-control-sm cpf" id="cpf"
                                value="{{ $user->cpf ?? old('cpf') }}" placeholder="CPF do Professor" maxlength="11">
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control form-control-sm" id="email"
                                value="{{ $user->email ?? old('email') }}" placeholder="E-mail do Professor">
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

                    <div class="form-group  col-sm-4">
                        <input type="hidden" name="password"
                            value="{{ bcrypt(str_replace(['.', '-'], '', $user->data_nascimento ?? old('data_nascimento'))) }}">
                    </div>
                    <div class="form-group  col-sm-2">
                        <input type="hidden" name="tipo" value="professor">
                    </div>

                    <div class="form-group  col-sm-2">
                        <input type="hidden" name="cargo_id" value="2">
                    </div>
                    <hr>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="bairro">Formação</label>
                            <input type="text" name="formacao" class="form-control form-control-sm" id="formacao"
                                value="{{ $user->colaborador->formacao ?? old('formacao') }}"
                                placeholder="Ex. Matemático">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="municipio">Valor Hora</label>
                            <input type="text" name="valor_hora_aula"
                                class="form-control form-control-sm valorMonetario" id="valor_hora_aula"
                                value="{{ $user->colaborador->valor_hora_aula ?? old('valor_hora_aula') }}"
                                placeholder="Ex.: 35.24">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>Dia</th>
                                        <th>Disponibilidade</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="align-middle">
                                            <div class="form-check m-4">
                                                <label class="form-label" for="segunda">Segunda Feira</label>
                                            </div>
                                        </td>
                                        <td class="align-middle p-3">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="segunda_inicio">Das:</label>
                                                    <input type="time" class="form-control" id="segunda_inicio" name="segunda_inicio"
                                                        value="{{ $user->colaborador->segunda_inicio ?? old('segunda_inicio') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="segunda_termino">Às:</label>
                                                    <input type="time" class="form-control" id="segunda_termino" name="segunda_termino"
                                                        value="{{ $user->colaborador->segunda_termino ?? old('segunda_termino') }}">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">
                                            <div class="form-check m-4">
                                                <label class="form-label" for="segunda">Terça Feira</label>
                                            </div>
                                        </td>
                                        <td class="align-middle p-3">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="terca_inicio">Das:</label>
                                                    <input type="time" class="form-control" id="terca_inicio" name="terca_inicio"
                                                        value="{{ $user->colaborador->terca_inicio ?? old('terca_inicio') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="terca_termino">Às:</label>
                                                    <input type="time" class="form-control" id="terca_termino" name="terca_termino"
                                                        value="{{ $user->colaborador->terca_termino ?? old('terca_termino') }}">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="align-middle">
                                            <div class="form-check m-4">
                                                <label class="form-label" for="segunda">Quarta Feira</label>
                                            </div>
                                        </td>
                                        <td class="align-middle p-3">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="quarta_inicio">Das:</label>
                                                    <input type="time" class="form-control" id="quarta_inicio" name="quarta_inicio"
                                                        value="{{ $user->colaborador->quarta_inicio ?? old('quarta_inicio') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="quarta_termino">Às:</label>
                                                    <input type="time" class="form-control" id="quarta_termino" name="quarta_termino"
                                                        value="{{ $user->colaborador->quarta_termino ?? old('quarta_termino') }}">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="align-middle">
                                            <div class="form-check m-4">
                                                <label class="form-label" for="segunda">Quinta Feira</label>
                                            </div>
                                        </td>
                                        <td class="align-middle p-3">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="quinta_inicio">Das:</label>
                                                    <input type="time" class="form-control" id="quinta_inicio" name="quinta_inicio"
                                                        value="{{ $user->colaborador->quinta_inicio ?? old('quinta_inicio') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="quinta_termino">Às:</label>
                                                    <input type="time" class="form-control" id="quinta_termino" name="quinta_termino"
                                                        value="{{ $user->colaborador->quinta_termino ?? old('quinta_termino') }}">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="align-middle">
                                            <div class="form-check m-4">
                                                <label class="form-label" for="segunda">Sexta Feira</label>
                                            </div>
                                        </td>
                                        <td class="align-middle p-3">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="sexta_inicio">Das:</label>
                                                    <input type="time" class="form-control" id="sexta_inicio" name="sexta_inicio"
                                                        value="{{ $user->colaborador->sexta_inicio ?? old('sexta_inicio') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="sexta_termino">Às:</label>
                                                    <input type="time" class="form-control" id="sexta_termino" name="sexta_termino"
                                                        value="{{ $user->colaborador->sexta_termino ?? old('sexta_termino') }}">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="align-middle">
                                            <div class="form-check m-4">
                                                <label class="form-label" for="segunda">Sábado</label>
                                            </div>
                                        </td>
                                        <td class="align-middle p-3">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="sabado_inicio">Das:</label>
                                                    <input type="time" class="form-control" id="sabado_inicio" name="sabado_inicio"
                                                        value="{{ $user->colaborador->sabado_inicio ?? old('sabado_inicio') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="sabado_termino">Às:</label>
                                                    <input type="time" class="form-control" id="sabado_termino" name="sabado_termino"
                                                        value="{{ $user->colaborador->sabado_termino ?? old('sabado_termino') }}">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="align-middle">
                                            <div class="form-check m-4">
                                                <label class="form-label" for="segunda">Domingo</label>
                                            </div>
                                        </td>
                                        <td class="align-middle p-3">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="domingo_inicio">Das:</label>
                                                    <input type="time" class="form-control" id="domingo_inicio" name="domingo_inicio"
                                                        value="{{ $user->colaborador->domingo_inicio ?? old('domingo_inicio') }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="domingo_termino">Às:</label>
                                                    <input type="time" class="form-control" id="domingo_termino" name="domingo_termino"
                                                        value="{{ $user->colaborador->domingo_termino ?? old('domingo_termino') }}">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button id="salvar_dados_professor" type="submit" class="btn btn-primary">{{ isset($user->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                </div>

                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/aluno/aluno.create.js') }}"></script>

@endsection
