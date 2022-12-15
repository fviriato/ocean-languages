@extends('home')

@section('titulo', 'Estagio de Ensino')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Estágio de Ensino</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('estagio.create') }}">Cadastrar Estagio de Ensino</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Estágio</th>
                                <th>Descrição</th>
                                <th style="width: 40px">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($estagios as $estagio)
                                <tr>
                                    <td>{{ $estagio->nome }}</td>
                                    <td>{{ $estagio->descricao }}</td>
                                    <td> <a href="{{ route('estagio.edit', ['estagio' => $estagio->id]) }}"><span class="badge bg-success">Editar</span></a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@endsection
