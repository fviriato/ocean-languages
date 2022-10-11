@extends('home')

@section('titulo', 'Nível de Ensino')

@section('content_header', 'Nível de Ensino')

@section('conteudo')

    <div class="row">
        <div class="col-md-6 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ isset($nivel->id) ? 'Editar Nível de Ensino do Idioma' : 'Cadastrar Nível de Ensino do Idioma' }}
                    </h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('nivel.index') }}">Voltar</a>
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

                @if (!empty($nivel->id))
                    <form method="POST" action="{{ route('nivel.update', ['nivel' => $nivel->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('nivel.store') }}">
                @endif
                @csrf
                <div class="card-body">

                    <div class="row">

                        <div class="form-group col-sm-8">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" class="form-control form-control-sm" name="nome"
                                id="exampleInputEmail1" placeholder="Nível de Ensino"
                                value="{{ $nivel->nome ?? old('nome') }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="sigla">Sigla</label>
                            <input type="text" class="form-control form-control-sm" name="sigla" id="sigla"
                                placeholder="A1 | B2 | C2" value="{{ $nivel->sigla ?? old('sigla') }}">
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="descricao">Descrição do Nível </label>
                            <textarea class="form-control" placeholder="Descrição do nível de ensino" name="descricao" id="descricao"
                                rows="3">{{ $nivel->descricao ?? null }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit"
                        class="btn btn-primary">{{ isset($nivel->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
