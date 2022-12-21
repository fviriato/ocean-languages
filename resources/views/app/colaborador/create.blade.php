@extends('home')

@section('titulo', 'Cadastrar Colaborador')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Cadastro de Colaborador</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('colaborador.index') }}">Voltar</a>
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
                    <form method="POST" action="{{ route('colaborador.update', ['colaborador' => $colaborador->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('colaborador.store') }}">
                @endif

                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name">Nome Completo</label>
                            <input type="text" name="name" class="form-control form-control-sm" id="name"
                                placeholder="Nome Completo do Colaborador" value="{{ $user->name ?? old('name') }}">
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
                                value="{{ $user->email ?? old('email') }}" placeholder="E-mail do Colaborador">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control form-control-sm" id="cpf"
                                value="{{ $user->cpf ?? old('cpf') }}" placeholder="CPF do Colaborador" maxlength="11">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="rg">RG</label>
                            <input type="text" name="rg" class="form-control form-control-sm" id="rg"
                                value="{{ $user->rg ?? old('rg') }}" placeholder="RG do Colaborador">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" class="form-control form-control-sm telefone"
                                id="telefone" value="{{ $user->telefone ?? old('telefone') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-5">
                            <label for="cargo_id">Cargo ou Função</label>
                            <select name="cargo_id" class="form-control form-control-sm" id="cargo_id">
                                <option></option>
                                @foreach ($cargos as $cargo)
                                    <option value="{{ $cargo->id }}"
                                        {{ ($user->colaborador->cargo_id ?? old('cargo_id')) == $cargo->id ? 'selected' : '' }}>
                                        {{ $cargo->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="salario">Salário</label>
                            <input type="text" name="salario" class="form-control form-control-sm" id="salario"
                                value="{{ $user->colaborador->salario ?? old('salario') }}">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="forma_remuneracao">Contratação</label>
                            <select name="forma_remuneracao" class="form-control form-control-sm" id="forma_remuneracao">
                                <option></option>
                                <option {{((($user->colaborador->forma_remuneracao ?? old('forma_remuneracao')) == 'hora') ? 'selected' : '')}}  value="hora">Horista</option>
                                <option {{((($user->colaborador->forma_remuneracao ?? old('forma_remuneracao')) == 'mes') ? 'selected' : '')}}  value="mes">Mensalista</option>
                            </select>
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
                                value="{{ $user->endereco->logradouro ?? old('logradouro') }}"
                                placeholder="Logradouro">
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
                                value="{{ $user->endereco->bairro ?? old('bairro') }}"
                                placeholder="Ex. Alto da Lapa">
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
                                value="{{ $user->endereco->estado ?? old('estado') }}"
                                placeholder="Ex. São Paulo">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit"
                        class="btn btn-primary">{{ isset($user->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                </div>

                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/aluno/aluno.create.js') }}"></script>

@endsection
