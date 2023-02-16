@extends('home')

@section('titulo', 'Gêneros')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-8 container-fluid">

            <div class="card">
                <div class="card-header bg-blue">
                    <h3 class="card-title">CONFIGURAÇÕES DO SISTEMA</h3>
                </div>
                <div class="card-body">

                    <a class="btn btn-app" href="{{ route('genero.index') }}">
                        <i class="fas fa-venus-mars"></i>Gênero
                    </a>
                    <a class="btn btn-app" href="{{ route('escola.index') }}">
                        <i class="fas fa-school"></i> Escolas
                    </a>
                    <a class="btn btn-app" href="{{ route('escolaridade.index') }}">
                        <i class="fas fa-graduation-cap"></i>Escolaridades
                    </a>
                    <a class="btn btn-app" href="{{ route('nivel.index') }}">
                        <i class="fas fa-layer-group"></i>Nível de Ensino
                    </a>
                    <a class="btn btn-app" href="{{ route('estagio.index') }}">
                        <i class="fas fa-signal"></i>Estágio de Ensino
                    </a>
                    <a class="btn btn-app" href="{{ route('disciplina.index') }}">
                        <i class="fas fa-language"></i>Idioma / Disciplina
                    </a>

                    <a class="btn btn-app" href="{{ route('cargo.index') }}">
                        <i class="fas fa-language"></i>Cargos
                    </a>
                    {{-- <a class="btn btn-app" href="{{ route('curso.index') }}">
                        <i class="fas fa-book-open"></i></i>Cursos
                    </a> --}}

                    <br>
                    <br>
                    <br>

                    {{-- <a class="btn btn-app" href="{{ route('colaborador.index') }}">
                        <i class="fas fa-user-plus"></i>Colaborador
                    </a> --}}

                    <br>
                    <br>
                    <br>

                    {{-- <a class="btn btn-app">
                        <i class="fas fa-book-open"></i>Livros
                    </a>
                    <a class="btn btn-app">
                        <i class="fas fa-cubes"></i> Estoque
                    </a>
                    <a class="btn btn-app">
                        <i class="fas fa-users"></i> Users
                    </a>
                    <a class="btn btn-app">
                        <i class="fas fa-inbox"></i> Orders
                    </a>
                    <a class="btn btn-app">
                        <i class="fas fa-envelope"></i> Inbox
                    </a>
                    <a class="btn btn-app">
                        <i class="fas fa-heart"></i> Likes
                    </a> --}}
                    {{-- <p>Configurações Gerenciais ESCONDER COM REGRA DE NEGÓCIO</p>
                    <a class="btn btn-app bg-secondary">
                        <span class="badge bg-success">300</span>
                        <i class="fas fa-barcode"></i> Products
                    </a>
                    <a class="btn btn-app bg-success">
                        <span class="badge bg-purple">891</span>
                        <i class="fas fa-users"></i> Users
                    </a>
                    <a class="btn btn-app bg-danger">
                        <span class="badge bg-teal">67</span>
                        <i class="fas fa-inbox"></i> Orders
                    </a>
                    <a class="btn btn-app bg-warning">
                        <span class="badge bg-info">12</span>
                        <i class="fas fa-envelope"></i> Inbox
                    </a>
                    <a class="btn btn-app bg-info">
                        <span class="badge bg-danger">531</span>
                        <i class="fas fa-heart"></i> Likes
                    </a> --}}
                </div>

            </div>
        </div>
    </div>
@endsection
