@extends('home')

@section('titulo', 'Gêneros')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-6 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Gêneros</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-indigo" href="{{ route('genero.create') }}">Cadastrar Novo</a>
                    
                    
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Gênero</th>
                                <th style="width: 40px">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($generos as $genero)
                                <tr>
                                    <td>{{ $genero->id }}</td>
                                    <td>{{ $genero->nome }}</td>
                                    <td> <a href="{{ route('genero.edit',$genero->id) }}" class="btn-xs bg-success">Editar</a>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@endsection
