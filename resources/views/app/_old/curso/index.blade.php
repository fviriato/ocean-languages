@extends('home')

@section('titulo', 'Cursos de Idiomas')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">

            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Cursos de Idiomas</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('curso.create') }}">Cadastrar Curso de Idioma</a>
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
                            @foreach ($cursos as $curso)
                                <tr>
                                    <td>{{ $curso->nome }}</td>
                                    <td>{{ $curso->idiomaDisciplina->nome }}</td>
                                    <td>{{ $curso->estagio->nome }}</td>
                                    <td>{{ $curso->nivel->nome }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('curso.edit', ['curso' => $curso->id]) }}">
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
