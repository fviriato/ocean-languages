@extends('home')

@section('titulo', 'Criar Nova Turma')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-12 container-fluid">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Criar Nova Turma</h3>
                    <div class="card-tools">
                        <a class="btn btn-xs btn-primary" href="{{ route('turma.index') }}">Voltar</a>
                    </div>
                </div>
                <form method="POST" action="{{ route('turma.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="nome">Turma</label>
                                <input type="text" name="nome" class="form-control" id="nome"
                                    placeholder="Nome ou Descrição da Turma" value="{{ old('nome') }}">
                            </div>


                            <div class="form-group col-sm-3">
                                <label for="idioma_disciplina_id">Idioma</label>
                                <select name="idioma_disciplina_id" class="form-control" id="idioma_disciplina_id">
                                    <option></option>
                                    <option>Masc</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="modalidade">Modalidade</label>
                                <select name="modalidade" class="form-control" id="modalidade">
                                    <option></option>
                                    <option>Masc</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="usuario_id">Professor</label>
                                <select name="usuario_id" class="form-control" id="usuario_id">
                                    <option></option>
                                    <option>Masc</option>
                                </select>
                            </div>


                        </div>

                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label for="data_inicio">Início</label>
                                <input type="date" name="data_inicio" class="form-control" id="data_inicio"
                                    value="{{ old('data_inicio') }}">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="data_termino">Términio</label>
                                <input type="date" name="data_termino" class="form-control" id="data_termino"
                                    value="{{ old('data_termino') }}">
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="primeiro_dia_semana">De</label>
                                <select name="primeiro_dia_semana" class="form-control" id="primeiro_dia_semana">
                                    <option></option>
                                    <option value="segunda">Segunda Feira</option>
                                    <option value="terça">Terça Feira</option>
                                    <option value="quarta">Quarta Feira</option>
                                    <option value="quinta">Quinta Feira</option>
                                    <option value="sexta">Sexta Feira</option>
                                    <option value="sabado">Sábado</option>
                                    <option value="domingo">Domingo</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="segundo_dia_semana">e</label>
                                <select name="segundo_dia_semana" class="form-control" id="segundo_dia_semana">
                                    <option></option>
                                    <option value="segunda">Segunda Feira</option>
                                    <option value="terça">Terça Feira</option>
                                    <option value="quarta">Quarta Feira</option>
                                    <option value="quinta">Quinta Feira</option>
                                    <option value="sexta">Sexta Feira</option>
                                    <option value="sabado">Sábado</option>
                                    <option value="domingo">Domingo</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="hora_inicio">Das</label>
                                <input type="time" name="hora_inicio" class="form-control" id="hora_inicio"
                                    value="{{ old('hora_inicio') }}">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="hora_termino">às</label>
                                <input type="time" name="hora_termino" class="form-control" id="hora_termino"
                                    value="{{ old('hora_termino') }}">
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
