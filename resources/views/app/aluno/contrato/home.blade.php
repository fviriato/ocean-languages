@extends('home')

@section('titulo', 'Alunos')

@section('content_header')

@section('conteudo')

    <div class="row">
        <div class="col-md-12 container-fluid">

            <div class="card">
                <div class="card-header bg-blue">
                    <h3 class="card-title">CONTRATO DE ALUNOS</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Aluno</th>
                                <th>Curso</th>
                                <th>Inicio Contrato</th>
                                <th>Término do Contrato</th>
                                {{-- <th>Nível</th>
                                <th>Modalidade</th>
                                <th>Dia</th>
                                <th>Hora</th>
                                <th>Professor</th>
                                <th>N° Máx Alunos</th> --}}
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contratos as $contrato)
                                <tr class="text-center">
                                    <td>{{ $contrato->aluno->user->name }}</td>
                                    <td>{{ $contrato->turma->curso->disciplina->nome }}</td>
                                    <td>{{ date('d/m/Y', strtotime($contrato->turma->data_inicio)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($contrato->turma->data_fim)) }}</td>
                                    {{-- <td>{{ $contrato->turma->curso->nivel->nome }}</td>
                                    <td>{{ Str::ucfirst($contrato->modalidade) }}</td>
                                    <td>{{ Str::ucfirst($contrato->primeiro_dia_semana) }} e {{Str::ucfirst($contrato->segundo_dia_semana)}} </td>
                                    <td> das {{ date('H:i', strtotime($contrato->hora_inicio)) }} às {{date('H:i', strtotime($contrato->hora_fim))}}</td>
                                    <td>{{ $contrato->aluno->user->name }}</td>
                                    <td>{{ $contrato->max_alunos }}</td> --}}
                                    <td>
                                        <a href="{{ route('contrato.ver', ['aluno' => $contrato->aluno->id ?? '', 'turma' => $contrato->turma->id ?? '', 'contrato' => $contrato->id]) }}">
                                            <span class="badge bg-primary">Ver Contrato</span>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $contratos->links('pagination::bootstrap-4') }}
                    </ul>
                </div>


            </div>

        </div>
    </div>



@endsection
