@extends('home')

@section('titulo', 'Turmas')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-12 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Relação de Alunos</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('aluno.home') }}">Voltar</a> &nbsp;&nbsp;&nbsp;
                        <a class="btn-xs bg-indigo" href="{{ route('aluno.create') }}">Cadastrar Aluno</a> &nbsp;&nbsp;&nbsp;
                        <a class="btn-xs bg-indigo" href="{{ route('aluno.create') }}">Matricular Aluno</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                {{-- <th>ID ALUNO</th> --}}
                                <th>Aluno</th>
                                <th>DT. Nasc</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th style="width: 40px">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    {{-- <td>{{ $usuario->aluno->id }}</td> --}}
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($usuario->data_nascimento)) }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td class="mask-phone">{{ $usuario->telefone }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('aluno.edit', ['aluno' => $usuario->id]) }}">
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
