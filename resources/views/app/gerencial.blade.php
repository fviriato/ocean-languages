@extends('home')

@section('titulo', "{{ date('y/d/Y') }}")

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Módulo Gerencial</h3>
                </div>
                <h1 class="text-center text-danger">Em Desenvolvimento</h1>
                <div class="card-body">
                    {{-- <a class="btn btn-app" href="">
                        <i class="fas fa-school"></i> Escolas
                    </a>
                    <a class="btn btn-app" href="">
                        <i class="fas fa-graduation-cap"></i>Escolaridades
                    </a>
                    <a class="btn btn-app" href="">
                        <i class="fas fa-layer-group"></i>Nível de Ensino
                    </a>
                    <a class="btn btn-app" href="">
                        <i class="fas fa-signal"></i>Estágio de Ensino
                    </a>
                    <a class="btn btn-app" href="">
                        <i class="fas fa-language"></i>Idioma / Disciplina
                    </a>
                    <a class="btn btn-app" href="">
                        <i class="fas fa-book-open"></i></i>Cursos
                    </a>
                    <a class="btn btn-app" href="">
                        <i class="fas fa-book-open"></i></i>Turmas de Alunos
                    </a>
                    <a class="btn btn-app" href="">
                        <i class="fas fa-user-plus"></i>Colaborador
                    </a> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
