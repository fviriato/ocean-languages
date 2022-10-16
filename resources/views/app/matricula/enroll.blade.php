@extends('home')

@section('titulo', 'Matricular Aluno')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-11 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Matricular Aluno</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('aluno.home') }}">Voltar</a>
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

                @if (!empty($aluno->id))
                    <form method="POST" action="{{ route('matricular.update', ['aluno' => $aluno->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('matricular.store') }}">
                @endif

                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="user_id">Aluno</label>
                            <select name="user_id" class="form-control form-control-sm" id="user_id">
                                <option></option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $user->user_id ?? old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="turma_id">Turma</label>
                            <select name="turma_id" class="form-control form-control-sm" id="turma_id">
                                <option></option>
                                @foreach ($turmas as $turma)
                                    <option value="{{ $turma->id }}"
                                        {{ $turma->user_id ?? old('turma_id') == $turma->id ? 'selected' : '' }}>
                                        {{ $turma->nome }}-
                                        {{ $turma->curso->idiomaDisciplina->nome }}-
                                        {{ $turma->curso->estagio->nome }}-
                                        {{ $turma->curso->nivel->nome }}-
                                        {{ $turma->modalidade }}-
                                        {{ date('d/m/Y', strtotime($turma->data_inicio)) }}-
                                        {{ date('d/m/Y', strtotime($turma->data_fim)) }}-
                                        {{ $turma->primeiro_dia_semana }} e
                                        {{ $turma->segundo_dia_semana }}das
                                        {{ $turma->hora_inicio }} às
                                        {{ $turma->hora_fim }}

                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row">



                        <div class="form-group col-sm-2">
                            <label for="estado">Valor Mensal</label>
                            <input type="text" name="valor_mensal" class="form-control form-control-sm" id="estado"
                                value="{{ $aluno->endereco->estado ?? old('estado') }}" placeholder="Ex. São Paulo">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="estado">Data Pagamento</label>
                            <input type="number" name="data_pagamento" class="form-control form-control-sm" id="estado"
                                value="{{ $aluno->endereco->estado ?? old('estado') }}" min="1" max="31"
                                step="1" placeholder="Ex. 10">
                        </div>
                    </div>

                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
