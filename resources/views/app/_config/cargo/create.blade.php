@extends('home')

@section('titulo', 'Cargo')

@section('content_header')

@section('conteudo')

    <div class="row">
        <div class="col-md-6 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ isset($cargo->id) ? 'Editar Cargo' : 'Cadastrar Cargo' }}
                    </h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('cargo.index') }}">Voltar</a>
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

                @if (!empty($cargo->id))
                    <form method="POST" action="{{ route('cargo.update', ['cargo' => $cargo->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('cargo.store') }}">
                @endif
                @csrf
                <div class="card-body">

                    <div class="row">

                        <div class="form-group col-sm-8">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" class="form-control form-control-sm" name="nome"
                                id="exampleInputEmail1" placeholder="Nome do Cargo"
                                value="{{ $cargo->nome ?? old('nome') }}">
                        </div>


                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit"
                        class="btn btn-primary">{{ isset($cargo->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
