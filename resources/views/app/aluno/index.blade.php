@extends('home')

@section('titulo', 'Alunos')

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
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Aluno</th>
                                <th>DT. Nasc</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th style="width: 40px">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alunos as $aluno)
                                <tr style="height:20px">
                                    <td>{{ str_pad($aluno->id,4,0, STR_PAD_LEFT) }}</td>
                                    <td>{{ $aluno->user->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($aluno->user->data_nascimento)) }}</td>
                                    <td>{{ $aluno->user->email }}</td>
                                    <td class="mask-phone">{{ $aluno->user->telefone }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('aluno.edit', ['aluno' => $aluno->id]) }}">
                                            <span class="badge bg-primary">Editar Cadastro</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $alunos->links('pagination::bootstrap-4') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection
