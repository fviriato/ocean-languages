@extends('home')

@section('titulo', 'Estágio de Ensino')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-6 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ isset($disciplina->id) ? 'Editar Idioma ou Disciplina' : 'Cadastrar Idioma ou Disciplina' }}
                    </h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('disciplina.index') }}">Voltar</a>
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

                @if (!empty($disciplina->id))
                    <form method="POST" action="{{ route('disciplina.update', ['disciplina' => $disciplina ?? ('')->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('disciplina.store') }}">
                @endif
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control form-control-sm" name="nome"
                                id="exampleInputEmail1" placeholder="Nome do Idioma ou Disciplina"
                                value="{{ $disciplina->nome ?? old('nome') }}">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="tipo">Tipo</label>
                            <select name="tipo" class="form-control form-control-sm" id="tipo">
                                <option></option>
                                <option {{ $disciplina->tipo == 'idioma' ? 'selected' : '' }} value="idioma">Idioma
                                </option>
                                <option {{ $disciplina->tipo == 'reforco' ? 'selected' : '' }} value="reforco">
                                    Disciplina de Reforço</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit"
                        class="btn btn-primary">{{ isset($disciplina->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                </div>
                </form>
            </div>
        </div>
    @endsection
