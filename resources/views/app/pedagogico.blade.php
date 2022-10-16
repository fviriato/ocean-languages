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

                    {{-- <h6 class="text-purple">Aluno</h6> --}}

                    <a class="btn btn-app" href="{{ route('aluno.home') }}">
                        <i class="fas fa-users"></i>Alunos
                    </a>
                    <hr>

                    {{-- <h6 class="text-purple">Professor</h6> --}}

                    <a class="btn btn-app" href="{{ route('professor.index') }}">
                        <i class="fas fa-graduation-cap"></i> Professores
                    </a>
                    <hr>
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
                        <i class="fas fa-user-graduate"></i>Turmas de Alunos
                    </a>
                    <a class="btn btn-app" href="{{ route('escola.index') }}">
                        <i class="fas fa-school"></i> Escolas
                    </a>
                    <a class="btn btn-app" href="{{ route('escolaridade.index') }}">
                        <i class="fas fa-graduation-cap"></i>Escolaridades
                    </a>

                    <hr>

                    <h6 class="text-purple">Configurações do Sistema</h6>

                    <br>
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
                    <a class="btn btn-app" href="{{ route('idiomaDisciplina.index') }}">
                        <i class="fas fa-language"></i>Idioma / Disciplina
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
