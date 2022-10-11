@extends('home')

@section('titulo', 'Cadastrar Curso')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Cadastro de Curso</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('curso.index') }}">Voltar</a>
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

                @if (!empty($curso->id))
                    <form method="POST" action="{{ route('curso.update', ['curso' => $curso->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('curso.store') }}">
                @endif

                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control form-control-sm" id="nome"
                                placeholder="Nome do Curso" value="{{ $curso->nome ?? old('nome') }}">
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-sm-3">
                            <label for="idioma_disciplina_id">Idioma</label>
                            <select name="idioma_disciplina_id" class="form-control form-control-sm"
                                id="idioma_disciplina_id">
                                <option></option>
                                @foreach ($idiomaDisciplinas as $idiomaDisciplina)
                                    <option value="{{ $idiomaDisciplina->id }}"
                                        {{ ($curso->idioma_disciplina_id ?? old('idioma_disciplina_id')) == $idiomaDisciplina->id ? 'selected' : '' }}>
                                        {{ $idiomaDisciplina->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="estagio_id">Estágio</label>
                            <select name="estagio_id" class="form-control form-control-sm" id="estagio_id">
                                <option></option>
                                @foreach ($estagios as $estagio)
                                    <option value="{{ $estagio->id }}" {{ ($curso->estagio_id ?? old('estagio_id')) == $estagio->id ? 'selected' : '' }}>
                                        {{ $estagio->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="nivel_id">Nível</label>
                            <select name="nivel_id" class="form-control form-control-sm"
                                id="nivel_id">
                                <option></option>
                                @foreach ($niveis as $nivel)
                                    <option value="{{ $nivel->id }}"
                                        {{ ($curso->nivel_id ?? old('nivel_id')) == $nivel->id ? 'selected' : '' }}>
                                        {{ $nivel->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit"
                        class="btn btn-primary">{{ isset($curso->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>

@endsection
