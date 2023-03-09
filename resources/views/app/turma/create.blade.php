@extends('home')

@section('titulo', 'Criar Nova Turma')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')


    <div class="row">
        <div class="col-md-11 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Criar Nova Turma</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('turma.index') }}">Voltar</a>
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

                @if (!empty($turma->id))
                    <form method="POST" action="{{ route('turma.update', ['turma' => $turma->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('turma.store') }}">
                @endif

                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="nome">Nome da Turma</label>
                            <input type="text" name="nome" class="form-control form-control-sm" id="nome"
                                placeholder="Nome ou Descrição da Turma" value="{{ $turma->nome ?? old('nome') }}">
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="disciplina_id">Idioma</label>
                            <select name="disciplina_id" class="form-control form-control-sm"
                                id="disciplina_id">
                                <option></option>
                                @foreach ($idiomas as $idioma)
                                    <option value="{{ $idioma->id }}"
                                        {{ ($turma->curso->disciplina_id ?? old('disciplina_id')) == $idioma->id ? 'selected' : '' }}>
                                        {{ $idioma->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="estagio_id">Estágio</label>
                            <select name="estagio_id" class="form-control form-control-sm" id="estagio_id">
                                <option></option>
                                @foreach ($estagios as $estagio)
                                    <option value="{{ $estagio->id }}"
                                        {{ ($turma->curso->estagio_id ?? old('estagio_id')) == $estagio->id ? 'selected' : '' }}>
                                        {{ $estagio->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="nivel_id">Nível</label>
                            <select name="nivel_id" class="form-control form-control-sm" id="nivel_id">
                                <option></option>
                                @foreach ($niveis as $nivel)
                                    <option value="{{ $nivel->id }}"
                                        {{ ($turma->curso->nivel_id ?? old('nivel_id')) == $nivel->id ? 'selected' : '' }}>
                                        {{ $nivel->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-sm-3">
                            <label for="modalidade">Modalidade</label>
                            <select name="modalidade" class="form-control form-control-sm" id="modalidade">
                                <option></option>
                                <option value="online"     {{ (($turma->modalidade ?? old('modalidade')) == 'online' ? 'selected' : '')}}>Online </option>
                                <option value="presencial" {{ (($turma->modalidade ?? old('modalidade')) == 'presencial' ? 'selected' : '')}}>Presencial</option>
                                <option value="hibrido"    {{ (($turma->modalidade ?? old('modalidade')) == 'hibrido' ? 'selected' : '')}}>Híbrido</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="tipo">Tipo</label>
                            <select name="tipo" class="form-control form-control-sm" id="tipo">
                                <option></option>
                                <option value="particular" {{ ($turma->tipo ?? old('tipo')) == 'particular' ? 'selected' : '' }}>Particular</option>
                                <option value="grupo"      {{ ($turma->tipo ?? old('tipo')) == 'grupo' ? 'selected' : '' }}>Grupo</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="colaborador_id">Professor</label>
                            <select name="colaborador_id" class="form-control form-control-sm" id="colaborador_id">
                                <option></option>
                                @foreach ($professores as $professor)
                                    <option value="{{ $professor->id }}" {{ ($turma->colaborador_id ?? old('colaborador_id')) == $professor->id ? 'selected' : '' }}>
                                        {{ $professor->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="data_inicio">Início</label>
                            <input type="date" name="data_inicio" class="form-control form-control-sm" id="data_inicio" value="{{ $turma->data_inicio ?? old('data_inicio') }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="data_fim">Términio</label>
                            <input type="date" name="data_fim" class="form-control form-control-sm" id="data_fim" value="{{ $turma->data_fim ?? old('data_fim') }}">
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="primeiro_dia_semana">De</label>
                            <select name="primeiro_dia_semana" class="form-control form-control-sm"
                                id="primeiro_dia_semana">
                                <option></option>
                                <option value="segunda"
                                    {{ ($turma->primeiro_dia_semana ?? old('primeiro_dia_semana')) == 'segunda' ? 'selected' : '' }}>
                                    Segunda Feira</option>
                                <option value="terca"
                                    {{ ($turma->primeiro_dia_semana ?? old('primeiro_dia_semana')) == 'terca' ? 'selected' : '' }}>
                                    Terça Feira</option>
                                <option value="quarta"
                                    {{ ($turma->primeiro_dia_semana ?? old('primeiro_dia_semana')) == 'quarta' ? 'selected' : '' }}>
                                    Quarta Feira</option>
                                <option value="quinta"
                                    {{ ($turma->primeiro_dia_semana ?? old('primeiro_dia_semana')) == 'quinta' ? 'selected' : '' }}>
                                    Quinta Feira</option>
                                <option value="sexta"
                                    {{ ($turma->primeiro_dia_semana ?? old('primeiro_dia_semana')) == 'sexta' ? 'selected' : '' }}>
                                    Sexta Feira</option>
                                <option value="sabado"
                                    {{ ($turma->primeiro_dia_semana ?? old('primeiro_dia_semana')) == 'sabado' ? 'selected' : '' }}>
                                    Sábado</option>
                                <option value="domingo"
                                    {{ ($turma->primeiro_dia_semana ?? old('primeiro_dia_semana')) == 'domingo' ? 'selected' : '' }}>
                                    Domingo</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="segundo_dia_semana">e</label>
                            <select name="segundo_dia_semana" class="form-control form-control-sm"
                                id="segundo_dia_semana">
                                <option></option>
                                <option value="segunda"
                                    {{ ($turma->segundo_dia_semana ?? old('segundo_dia_semana')) == 'segunda' ? 'selected' : '' }}>
                                    Segunda Feira</option>
                                <option value="terca"
                                    {{ ($turma->segundo_dia_semana ?? old('segundo_dia_semana')) == 'terca' ? 'selected' : '' }}>
                                    Terça Feira</option>
                                <option value="quarta"
                                    {{ ($turma->segundo_dia_semana ?? old('segundo_dia_semana')) == 'quarta' ? 'selected' : '' }}>
                                    Quarta Feira</option>
                                <option value="quinta"
                                    {{ ($turma->segundo_dia_semana ?? old('segundo_dia_semana')) == 'quinta' ? 'selected' : '' }}>
                                    Quinta Feira</option>
                                <option value="sexta"
                                    {{ ($turma->segundo_dia_semana ?? old('segundo_dia_semana')) == 'sexta' ? 'selected' : '' }}>
                                    Sexta Feira</option>
                                <option value="sabado"
                                    {{ ($turma->segundo_dia_semana ?? old('segundo_dia_semana')) == 'sabado' ? 'selected' : '' }}>
                                    Sábado</option>
                                <option value="domingo"
                                    {{ ($turma->segundo_dia_semana ?? old('segundo_dia_semana')) == 'domingo' ? 'selected' : '' }}>
                                    Domingo</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="hora_inicio">Das</label>
                            <input type="time" name="hora_inicio" class="form-control form-control-sm"
                                id="hora_inicio" value="{{ $turma->hora_inicio ?? old('hora_inicio') }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="hora_fim">às</label>
                            <input type="time" name="hora_fim" class="form-control form-control-sm" id="hora_fim"
                                value="{{ $turma->hora_fim ?? old('hora_fim') }}">
                        </div>

                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ isset($turma->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
