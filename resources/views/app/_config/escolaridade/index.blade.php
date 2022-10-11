@extends('home')

@section('titulo', 'Escolaridade')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-6 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Escolaridades</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('escolaridade.create') }}">Cadastrar Nova Escolaridade</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Escolaridade</th>
                                <th style="width: 40px">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($escolaridades as $escolaridade)
                                <tr>
                                    <td>{{ $escolaridade->id }}</td>
                                    <td>{{ $escolaridade->descricao }}</td>
                                    <td><a href="{{ route('escolaridade.edit', $escolaridade->id) }}" class="btn-xs bg-success">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@endsection
