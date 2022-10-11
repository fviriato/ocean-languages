@extends('home')

@section('titulo', 'Cadastrar Professor')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Cadastro de Professores</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('professor.home') }}">Voltar</a>
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

                @if (!empty($professor->id))
                    <form method="POST" action="{{ route('professor.update', ['professor' => $professor->id]) }}">
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
                                placeholder="Nome Completo do Professor" value="{{ $professor->name ?? old('name') }}">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="data_nascimento">Data Nascimento</label>
                            <input type="date" name="data_nascimento" class="form-control form-control-sm"
                                id="data_nascimento" value="{{ $professor->data_nascimento ?? old('data_nascimento') }}">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="genero_id">Gênero</label>
                            <select name="genero_id" class="form-control form-control-sm" id="genero_id">
                                <option></option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->id }}"
                                        {{ ($professor->genero_id ?? old('genero_id')) == $genero->id ? 'selected' : '' }}>
                                        {{ $genero->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control form-control-sm" id="email"
                                value="{{ $professor->email ?? old('email') }}" placeholder="E-mail do Professor">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control form-control-sm cpf" id="cpf"
                                value="{{ $professor->cpf ?? old('cpf') }}" placeholder="CPF do Professor">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="rg">RG</label>
                            <input type="text" name="rg" class="form-control form-control-sm rg" id="rg"
                                value="{{ $professor->rg ?? old('rg') }}" placeholder="RG do Professor">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" class="form-control form-control-sm telefone"
                                id="telefone" value="{{ $professor->telefone ?? old('telefone') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" class="form-control form-control-sm cep" id="cep"
                                value="{{ $professor->endereco->cep ?? old('cep') }}" placeholder="CEP" maxlength="8">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="logradouro">Endereço</label>
                            <input type="text" name="logradouro" class="form-control form-control-sm" id="logradouro"
                                value="{{ $professor->endereco->logradouro ?? old('logradouro') }}"
                                placeholder="Logradouro">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="numero">Número</label>
                            <input type="text" name="numero" class="form-control form-control-sm" id="numero"
                                value="{{ $professor->endereco->numero ?? old('numero') }}" placeholder="Ex. 45B">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="complemento">Complemento</label>
                            <input type="text" name="complemento" class="form-control form-control-sm"
                                id="complemento" value="{{ $professor->endereco->complemento ?? old('complemento') }}"
                                placeholder="Ex. Fundos">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-5">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" class="form-control form-control-sm" id="bairro"
                                value="{{ $professor->endereco->bairro ?? old('bairro') }}"
                                placeholder="Ex. Alto da Lapa">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="municipio">Município</label>
                            <input type="text" name="municipio" class="form-control form-control-sm" id="municipio"
                                value="{{ $professor->endereco->municipio ?? old('municipio') }}"
                                placeholder="Ex. Mogi das Cruzes">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" class="form-control form-control-sm" id="estado"
                                value="{{ $professor->endereco->estado ?? old('estado') }}" placeholder="Ex. São Paulo">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <form action="form-inline" id="materia_professor">
                            <div class="form-group col-sm-4">
                                <label for="idioma_disciplina_id">Matéria</label>
                                <select name="idioma_disciplina_id" class="form-control form-control-sm" id="idioma_disciplina">
                                    <option></option>
                                    @foreach ($materias as $materia)
                                        <option value="{{ $materia->id }}"
                                            {{ ($professor->idioma_disciplina_id ?? old('idioma_disciplina_id')) == $materia->id ? 'selected' : '' }}>
                                            {{ $materia->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-inline m-0 text-white">Matéria</label>
                                <button onclick="AddTableRow();" id="salvar_materia_professor" class="btn btn-primary">+</button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered col-sm-6" id="materias" border="1px">
                        <thead>
                            <tr class="text-center">
                                <td>Matéria</td>
                                <td>Ação</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/aluno/aluno.create.js') }}"></script>

@endsection
