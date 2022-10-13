@extends('home')

@section('titulo', 'Turmas')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')


<div class="row">
    <div class="col-md-10 container-fluid">

        <div class="card card-purple">
            <div class="card-header">
                <h3 class="card-title">Turmas de Alunos</h3>
                <div class="card-tools">
                    <a class="btn-xs bg-indigo" href="{{ route('turma.create') }}">Cadastrar Nova Turma</a>
                </div>
            </div>


            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Idioma</th>
                            <th>Estágio</th>
                            <th>Nível</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($turmas as $turma)
                            <tr>
                                <td>{{ $turma->nome }}</td>
                                <td>{{ $turma->curso->idiomaDisciplina->nome }}</td>
                                <td>{{ $turma->curso->estagio->nome }}</td>
                                <td>{{ $turma->curso->nivel->nome }}</td>
                                <td class="text-center">
                                    <a href="{{ route('turma.edit', ['turma' => $turma->id]) }}">
                                        <span class="badge bg-primary">Editar</span>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>





@endsection
