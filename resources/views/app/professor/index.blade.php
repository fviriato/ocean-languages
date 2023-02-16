@extends('home')

@section('titulo', 'Professores')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Relação de Professores</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('professor.home') }}">Voltar</a> &nbsp;&nbsp;&nbsp;
                        <a class="btn-xs bg-yellow" href="{{ route('professor.create') }}">Cadastrar Professor</a> &nbsp;&nbsp;&nbsp;
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Registro</th>
                                <th>Professor</th>
                                <th>DT Nasc</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($colaboradores as $colaborador)
                                <tr>
                                    <td>{{ $colaborador->registro }}</td>
                                    <td>{{ $colaborador->user->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($colaborador->user->data_nascimento)) }}</td>
                                    <td>{{ $colaborador->user->telefone }}</td>
                                    <td>{{ $colaborador->user->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('professor.edit', ['professor' => $colaborador->id]) }}">
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
                        {{ $colaboradores->links('pagination::bootstrap-4') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection
