@extends('home')

@section('titulo', 'Professor')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-9 container-fluid">

            <div class="card">
                <div class="card-header bg-gradient-olive">
                    <h3 class="card-title">MENU DE PROFESSORES</h3>
                </div>
                <div class="card-body">
                    <a class="btn btn-app" href="{{ route('professor.create') }}">
                        <i class="fas fa-file-signature"></i>Cadastrar
                    </a>
                    <a class="btn btn-app" href="{{ route('idioma.index') }}">
                        <i class="fas fa-chalkboard"></i>Matérias
                    </a>
                    <a class="btn btn-app" href="{{ route('professor.index') }}">
                        <i class="fas fa-restroom"></i>Professores
                    </a>
                    <a class="btn btn-app">
                        <i class="fas fa-file-word"></i>Relatórios
                    </a>

                </div>

            </div>
        </div>
    </div>


@endsection
