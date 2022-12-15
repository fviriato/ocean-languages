@extends('home')

@section('titulo', 'Escolas')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-8 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Escolas</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('escola.create') }}">Cadastrar Nova Escola</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Escola</th>
                                <th style="width: 40px">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($escolas as $escola)
                                <tr>
                                    <td>{{ $escola->id }}</td>
                                    <td>{{ $escola->nome }}</td>
                                    <td><a href="{{ route('escola.edit', $escola->id) }}" class="btn-xs bg-success">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $escolas->links('pagination::bootstrap-4') }}
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
