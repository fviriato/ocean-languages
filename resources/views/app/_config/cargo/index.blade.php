@extends('home')

@section('titulo', 'Cargos')

@section('content_header')

@section('conteudo')

    <div class="row">
        <div class="col-md-6 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Nível de Ensino</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('cargo.create') }}">Cadastrar Cargo</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Cargo</th>
                                <th style="width: 40px">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cargos as $cargo)
                                <tr>
                                    <td>{{ $cargo->nome }}</td>
                                    <td><a href="{{ route('cargo.edit', $cargo->id) }}" class="btn-xs bg-success">Editar</a>
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
