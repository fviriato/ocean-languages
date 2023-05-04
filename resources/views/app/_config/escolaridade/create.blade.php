@extends('home')

@section('titulo', 'Escolaridade')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-6 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($escolaridade->id) ? 'Editar Escolaridade' : 'Cadastrar Escolaridade' }}</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('escolaridade.index') }}">Voltar</a>
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

                @if (!empty($escolaridade->id))
                    <form method="POST" action="{{ route('escolaridade.update', ['escolaridade' => $escolaridade->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('escolaridade.store') }}">
                @endif
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" class="form-control form-control-sm" name="descricao" id="exampleInputEmail1"
                            placeholder="Informe a Escolaridade" value="{{ $escolaridade->descricao ?? old('descricao') }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ isset($escolaridade->id) ? 'Atualizar' : 'Cadastrar' }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
