@extends('home')

@section('titulo', 'Matricular Aluno')

@section('content_header')

@section('conteudo')

    <div class="row">
        <div class="col-md-11 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Matricular Aluno</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('aluno.home') }}">Voltar</a>
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

                @if (!empty($matricula->id))
                    <form method="POST" action="{{ route('contrato.update', ['contrato' => $contrato->id]) }}">
                        @method('PUT')
                    @else
                        <form method="GET"
                            action="{{ route('contrato.revisar', ['aluno' => $aluno->id ?? '', 'turma' => $turma->id ?? '']) }}">
                @endif

                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="aluno_id">Aluno</label>
                            <select name="aluno_id" class="form-control form-control-sm" id="aluno_id">
                                <option></option>
                                @foreach ($alunos as $aluno)
                                    <option value="{{ $aluno->id }}"
                                        {{ ($aluno->aluno_id ?? old('aluno_id')) == $aluno->id ? 'selected' : '' }}>
                                        {{ $aluno->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
{{-- 
                    <div class="form-group col-sm-4">
                        <label for="tipo">Tipo Contrato</label>
                        <select name="tipo" class="form-control form-control-sm" id="tipo">
                            <option></option>
                            <option value="grupo" {{$turma->tipo == 'grupo' ?? 'selected'}}>Grupo</option>
                            <option value="particular" {{$turma->tipo == 'particular' ?? 'selected'}}>Particular</option>
                        </select>
                    </div> --}}



                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label for="turma_id">Turma</label>
                            <select name="turma_id" class="form-control form-control-sm" id="turma_id">
                                <option></option>
                                @foreach ($turmas as $turma)
                                    <option value="{{ $turma->id }}"
                                        {{ $turma->user_id ?? old('turma_id') == $turma->id ? 'selected' : '' }}>
                                        {{ $turma->nome }}-
                                        {{ $turma->curso->disciplina->nome }}-
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
                        <div class="form-group col-sm-4">
                            <label for="valor_mensal">Valor Mensalidade</label>
                            <input type="number" name="valor_mensal" class="form-control form-control-sm" id="valor_mensal"
                                value="{{ $aluno->valor_mensal ?? old('valor_mensal') }}" placeholder="Ex. R$300,00"
                                step="0.01">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="data_pagamento">Dia Pagamento Mensalidade</label>
                            <input type="number" name="data_pagamento" class="form-control form-control-sm"
                                id="data_pagamento" value="{{ $aluno->data_pagamento ?? old('data_pagamento') }}"
                                min="1" max="31" step="1" placeholder="Ex. 10">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="material_didatico">Preço Material Didático</label>
                            <input type="number" name="material_didatico" class="form-control form-control-sm"
                                id="material_didatico" value="{{ $aluno->material_didatico ?? old('material_didatico') }}"
                                placeholder="Ex. R$280,00" step="0.01">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="parcelas">N° de Parcelas</label>
                            <input type="number" name="parcelas" class="form-control form-control-sm" id="parcelas"
                                value="{{ $aluno->parcelas ?? old('parcelas') }}" min="1" max="12"
                                step="1" placeholder="Ex. 6">
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Revisar e Matricular</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
