@extends('home')

@section('titulo', 'Turmas')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')


    <div class="row">
        <div class="col-md-10 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Informações da Turmas </h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('turma.index') }}">Turmas de Alunos</a>
                    </div>
                </div>Guarulhos, May 4th 2023


                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 callout callout-danger">
                            <p class="text-primary text-bold">Turma: <span class="text-gray">{{ $turma->nome }}</span></p>
                            <p class="text-primary text-bold">Idioma: <span
                                    class="text-gray">{{ $turma->curso->disciplina->nome }}</span></p>
                            <p class="text-primary text-bold"> Professor: <span
                                    class="text-gray">{{ $turma->colaborador->user->name }}</p>
                        </div>

                        <div class="col-sm-4 callout callout-success">
                            <p class="text-primary text-bold">Ás: <span
                                    class="text-gray">{{ $turma->primeiro_dia_semana }}</span></p>
                            <p class="text-primary text-bold"> e: <span class="text-gray">{{ $turma->segundo_dia_semana }}
                            </p>
                        </div>

                        <div class="col-sm-4 callout callout-warning">
                            <p class="text-primary text-bold">Início: <span
                                    class="text-gray">{{ date('d/m/Y', strtotime($turma->data_inicio)) }}</span></p>
                            <p class="text-primary text-bold"> Término: <span
                                    class="text-gray">{{ date('d/m/Y', strtotime($turma->data_fim)) }}</p>
                        </div>
                    </div>

                    <table class="table table-bordered table-hover m-2">
                        <thead>
                            <tr class="text-center">
                                <th>Aluno</th>
                                <th>Faltas</th>
                                <th>Observações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contratos as $contrato)
                                <tr class="text-center">
                                    <td>{{ $contrato->aluno->user->name }}</td>
                                    <td></td>
                                    <td> </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{-- <ul class="pagination pagination-sm m-0 float-right">
                        {{ $turmas->links('pagination::bootstrap-4') }}
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>





@endsection
