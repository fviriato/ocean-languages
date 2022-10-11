@extends('home')

@section('titulo', "{{ date('y/d/Y') }}")

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Módulo Administrativo</h3>
                </div>
                <div class="card-body">
                    <a class="btn btn-app" href="{{ route('aluno.home') }}">
                        <i class="fas fa-users"></i>Alunos
                    </a>
                    <a class="btn btn-app" href="{{ route('professor.home') }}">
                        <i class="fas fa-graduation-cap"></i> Professores
                    </a>
                    <a class="btn btn-app" href="{{ route('matricular.index') }}">
                        <i class="fas fa-layer-group"></i>Matriculas
                    </a>
                    <a class="btn btn-app" href="{{ route('colaborador.index') }}">
                        <i class="fas fa-restroom"></i>Funcionários
                    </a>
                    {{-- <a class="btn btn-app" href="">
                        <i class="fas fa-language"></i>Relatórios
                    </a> --}}
                    {{-- <a class="btn btn-app" href="">
                        <i class="fas fa-book-open"></i></i>Usuários
                    </a> --}}

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
