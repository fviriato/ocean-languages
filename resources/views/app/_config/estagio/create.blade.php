@extends('home')

@section('titulo', 'Estágio de Ensino')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-6 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ isset($estagio->id) ? 'Editar Estágio de Ensino do Idioma' : 'Cadastrar Estágio de Ensino do Idioma' }}
                    </h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('estagio.index') }}">Voltar</a>
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

                @if (!empty($estagio->id))
                    <form method="POST" action="{{ route('estagio.update', ['estagio' => $estagio->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('estagio.store') }}">
                @endif
                @csrf
                <div class="card-body">

                    <div class="row">

                        <div class="form-group col-sm-8">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" class="form-control form-control-sm" name="nome"
                                id="exampleInputEmail1" placeholder="Estágio de Ensino"
                                value="{{ $estagio->nome ?? old('nome') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="descricao">Descrição do Estágio </label>
                            <textarea class="form-control" placeholder="Descrição do Estágio de ensino" name="descricao" id="descricao"
                                rows="3">{{ $estagio->descricao ?? null }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit"
                        class="btn btn-primary">{{ isset($estagio->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
