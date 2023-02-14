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
                        {{-- <a class="btn-xs bg-indigo" href="{{ back() }}">Voltar</a> &nbsp;&nbsp;&nbsp; --}}
                        <a class="btn-xs bg-indigo" href="{{ route('professor.create') }}">Cadastrar Professor</a> &nbsp;&nbsp;&nbsp;
                        {{-- <a class="btn-xs bg-indigo" href="{{ route('professor.materia') }}">Atribuir Matéria</a> --}}
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
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
                                    <td>{{ $colaborador->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($colaborador->data_nascimento)) }}</td>
                                    <td>{{ $colaborador->telefone }}</td>
                                    <td>{{ $colaborador->email }}</td>
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
