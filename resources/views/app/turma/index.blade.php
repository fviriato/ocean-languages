@extends('home')

@section('titulo', 'Turmas')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')


    <div class="row">
        <div class="col-md-12 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Turmas de Alunos</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('turma.create') }}">Cadastrar Nova Turma</a>
                    </div>
                </div>


                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Nome</th>
                                <th>Idioma</th>
                                <th>Estágio</th>
                                <th>Nível</th>
                                <th>Modalidade</th>
                                <th>Dia</th>
                                <th>Hora</th>
                                <th>Professor</th>
                                <th>N° Máx Alunos</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($turmas as $turma)
                                <tr class="text-center">
                                    <td>{{ $turma->nome }}</td>
                                    <td>{{ $turma->curso->disciplina->nome }}</td>
                                    <td>{{ $turma->curso->estagio->nome }}</td>
                                    <td>{{ $turma->curso->nivel->nome }}</td>
                                    <td>{{ Str::ucfirst($turma->modalidade) }}</td>
                                    <td>{{ Str::ucfirst($turma->primeiro_dia_semana) }} e {{Str::ucfirst($turma->segundo_dia_semana)}} </td>
                                    <td> das {{ date('H:i', strtotime($turma->hora_inicio)) }} às {{date('H:i', strtotime($turma->hora_fim))}}</td>
                                    <td>{{ $turma->colaborador->user->name }}</td>
                                    <td>{{ $turma->max_alunos }}</td>
                                    <td>
                                        <a href="{{ route('turma.edit', ['turma' => $turma->id]) }}">
                                            <span class="badge bg-primary">Editar</span>
                                        </a>
                                        <a href="{{ route('turma.ver.alunos', ['turma' => $turma->id]) }}">
                                            <span class="badge bg-success">Ver Alunos</span>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $turmas->links('pagination::bootstrap-4') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>





@endsection
