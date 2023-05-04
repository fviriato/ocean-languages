@extends('home')

@section('titulo', 'Nível de Ensino')

@section('content_header', 'Nível de Ensino')

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Nível de Ensino</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('nivel.create') }}">Cadastrar Nível de Ensino</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nível</th>
                                <th>Sigla</th>
                                <th>Descrição</th>
                                <th style="width: 40px">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($niveis as $nivel)
                                <tr>
                                    <td>{{ $nivel->nome }}</td>
                                    <td>{{ $nivel->sigla }}</td>
                                    <td>{{ $nivel->descricao }}</td>
                                    <td><a href="{{ route('nivel.edit', $nivel->id) }}" class="btn-xs bg-success">Editar</a>
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
