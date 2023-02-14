@extends('home')

@section('titulo', 'Matéria por Professor')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title"></h3>
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
                    <form method="POST" action="{{ route('aluno.update', ['aluno' => $aluno->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('aluno.store') }}">
                @endif

                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="genero_id">Aluno</label>
                            <select name="genero_id" class="form-control form-control-sm" id="genero_id">
                                <option></option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->id }}"
                                        {{ $aluno->genero_id ?? old('genero_id') == $genero->id ? 'selected' : '' }}>
                                        {{ $genero->nome }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="genero_id">Curso</label>
                            <select name="genero_id" class="form-control form-control-sm" id="genero_id">
                                <option></option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->id }}"
                                        {{ $aluno->genero_id ?? old('genero_id') == $genero->id ? 'selected' : '' }}>
                                        {{ $genero->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row">

                        <div class="form-group col-sm-5">
                            <label for="genero_id">Turma</label>
                            <select name="genero_id" class="form-control form-control-sm" id="genero_id">
                                <option></option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->id }}"
                                        {{ $aluno->genero_id ?? old('genero_id') == $genero->id ? 'selected' : '' }}>
                                        {{ $genero->nome }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-sm-2">
                            <label for="estado">Valor Mensal</label>
                            <input type="text" name="valor_mensal" class="form-control form-control-sm" id="estado"
                                value="{{ $aluno->endereco->estado ?? old('estado') }}" placeholder="Ex. São Paulo">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="estado">Pagar todo dia</label>
                            <input type="number" name="data_pagamento" class="form-control form-control-sm" id="estado"
                                value="{{ $aluno->endereco->estado ?? old('estado') }}" min="1" max="31" step="1" placeholder="Ex. 10">
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
