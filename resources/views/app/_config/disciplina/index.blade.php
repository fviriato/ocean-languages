@extends('home')

@section('titulo', 'Idioma Disciplina')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-8 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Idiomas e Disciplinas</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('disciplina.create') }}">Cadastrar Idioma ou Disciplina</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Idioma / Disciplina</th>
                                <th>Utilizado em</th>
                                <th style="width: 40px">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disciplinas as $disciplina)
                                <tr>
                                    <td>{{ $disciplina->nome }}</td>
                                    <td>{{ ($disciplina->tipo == 'idioma' ? 'Curso de Idioma' : 'Reforço Escolar') }}</td>
                                    <td> <a
                                            href="{{ route('disciplina.edit', ['disciplina' => $disciplina->id]) }}"><span
                                                class="badge bg-success">Editar</span></a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@endsection
