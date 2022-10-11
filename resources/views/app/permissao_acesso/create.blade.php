@extends('home')

@section('titulo', 'Permissão de Acessos')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    {{-- <div class="row">
        <div class="col-md-12 container-fluid">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar Permissões de Acesso</h3>
                    <div class="card-tools">
                        <a class="btn btn-xs btn-primary" href="{{ route('permissoes.index') }}">Voltar</a>
                    </div>
                </div>
                <form method="POST" action="{{ route('permissoes.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="nome_completo">Nome Completo</label>
                                <input type="text" name="nome" class="form-control" id="nome_completo"
                                    placeholder="Nome Completo do Aluno" value="{{ old('nome') }}">
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="data_nascimento">Data Nascimento</label>
                                <input type="date" name="data_nascimento" class="form-control" id="data_nascimento"
                                    value="{{ old('data_nascimento') }}">
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="genero_id">Gênero</label>
                                <select name="genero_id" class="form-control" id="genero_id">
                                    <option></option>
                                    <option>Masc</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ old('email') }}" placeholder="E-mail do Aluno">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" class="form-control" id="cpf"
                                    value="{{ old('cpf') }}" placeholder="CPF do Aluno">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="rg">RG</label>
                                <input type="text" name="rg" class="form-control" id="rg"
                                    value="{{ old('rg') }}" placeholder="RG do Aluno">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone" class="form-control" id="telefone"
                                    value="{{ old('telefone') }}" placeholder="(XX) X XXXX-XXXX">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" class="form-control" id="cep"
                                    value="{{ old('cep') }}" placeholder="CEP">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="logradouro">Endereço</label>
                                <input type="text" name="logradouro" class="form-control" id="logradouro"
                                    value="{{ old('logradouro') }}" placeholder="Logradouro">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="numero">Número</label>
                                <input type="text" name="numero" class="form-control" id="numero"
                                    value="{{ old('numero') }}" placeholder="Ex. 45B">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="complemento">Complemento</label>
                                <input type="text" name="complemento" class="form-control" id="complemento"
                                    value="{{ old('complemento') }}" placeholder="Ex. Fundos">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-5">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="bairro" class="form-control" id="bairro"
                                    value="{{ old('bairro') }}" placeholder="Ex. Alto da Lapa">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="municipio">Município</label>
                                <input type="text" name="municipio" class="form-control" id="municipio"
                                    value="{{ old('municipio') }}" placeholder="Ex. Mogi das Cruzes">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" class="form-control" id="estado"
                                    value="{{ old('estado') }}" placeholder="Ex. São Paulo">
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="responsavel_nome">Nome Completo do Responsável</label>
                                <input type="text" name="responsavel_nome" class="form-control" id="responsavel_nome"
                                    placeholder="Nome Completo do Responsável" value="{{ old('responsavel_nome') }}">
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="responsavel_data_nascimento">Data Nascimento do Responsável</label>
                                <input type="date" name="responsavel_data_nascimento" class="form-control"
                                    id="responsavel_data_nascimento" value="{{ old('responsavel_data_nascimento') }}">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="responsavel_email">E-mail do Responsável</label>
                                <input type="email" name="responsavel_email" class="form-control"
                                    id="responsavel_email" value="{{ old('responsavel_') }}"
                                    placeholder="E-mail do Responsável">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="responsavel_cpf">CPF do Responsável</label>
                                <input type="text" name="responsavel_cpf" class="form-control" id="responsavel_cpf"
                                    value="{{ old('responsavel_cpf') }}" placeholder="CPF do Responsável">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="responsavel_rg">RG do Responsável</label>
                                <input type="text" name="responsavel_rg" class="form-control" id="responsavel_rg"
                                    value="{{ old('responsavel_rg') }}" placeholder="RG do Responsável">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="responsavel_telefone">Telefone do Resp.</label>
                                <input type="text" name="responsavel_telefone" class="form-control"
                                    id="responsavel_telefone" value="{{ old('responsavel_telefone') }}"
                                    placeholder="(XX) X XXXX-XXXX">
                            </div>
                            <input type="hidden" name="tipo_usuario" value="aluno">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}



    <div class="row">
        <div class="col-md-8 container-fluid">

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">iCheck Bootstrap - Checkbox &amp; Radio Inputs</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('permissoes.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group clearfix"></div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxPrimary1" name="criacao">
                                        <label for="checkboxPrimary1">
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxPrimary2" name="edicao">
                                        <label for="checkboxPrimary2">
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxPrimary3" name="leitura">
                                        <label for="checkboxPrimary3">
                                            Aluno
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" checked="" id="checkboxDanger1">
                                        <label for="checkboxDanger1">
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="checkboxDanger2">
                                        <label for="checkboxDanger2">
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" disabled="" id="checkboxDanger3">
                                        <label for="checkboxDanger3">
                                            Danger checkbox
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" name="r2" checked="" id="radioDanger1">
                                        <label for="radioDanger1">
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" name="r2" id="radioDanger2">
                                        <label for="radioDanger2">
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" name="r2" disabled="" id="radioDanger3">
                                        <label for="radioDanger3">
                                            Danger radio
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" checked="" id="checkboxSuccess1">
                                        <label for="checkboxSuccess1">
                                        </label>
                                    </div>
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" id="checkboxSuccess2">
                                        <label for="checkboxSuccess2">
                                        </label>
                                    </div>
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" disabled="" id="checkboxSuccess3">
                                        <label for="checkboxSuccess3">
                                            Success checkbox
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" name="r3" checked="" id="radioSuccess1">
                                        <label for="radioSuccess1">
                                        </label>
                                    </div>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" name="r3" id="radioSuccess2">
                                        <label for="radioSuccess2">
                                        </label>
                                    </div>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" name="r3" disabled="" id="radioSuccess3">
                                        <label for="radioSuccess3">
                                            Success radio
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
