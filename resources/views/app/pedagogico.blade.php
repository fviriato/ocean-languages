@extends('home')

@section('titulo', "{{ date('y/d/Y') }}")

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Módulo Pedagógico</h3>
                </div>
                <div class="card-body">
                    <a class="btn btn-app" href="{{ route('nivel.index') }}">
                        <i class="fas fa-layer-group"></i>Nível de Ensino
                    </a>
                    <a class="btn btn-app" href="{{ route('estagio.index') }}">
                        <i class="fas fa-signal"></i>Estágio de Ensino
                    </a>
                    <a class="btn btn-app" href="{{ route('idiomaDisciplina.index') }}">
                        <i class="fas fa-language"></i>Idioma / Disciplina
                    </a>
                    <a class="btn btn-app" href="{{ route('curso.index') }}">
                        <i class="fas fa-book-open"></i></i>Cursos
                    </a>
                    <a class="btn btn-app" href="{{ route('turma.index') }}">
                        <i class="fas fa-users-viewfinder"></i>Turmas de Alunos
                    </a>


                    <a class="btn btn-app" href="">
                        <i class="fas fa-school"></i> Escolas
                    </a>
                    <a class="btn btn-app" href="">
                        <i class="fas fa-graduation-cap"></i>Escolaridades
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

