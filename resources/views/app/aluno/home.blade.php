@extends('home')

@section('titulo', 'Alunos')

@section('content_header')

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">

            <div class="card">
                <div class="card-header bg-blue">
                    <h3 class="card-title">MENU DE ALUNOS</h3>
                </div>
                <div class="card-body">
                    <a class="btn btn-app" href="{{ route('aluno.create') }}">
                        <i class="fas fa-file-signature"></i>Cadastrar
                    </a>
                    <a class="btn btn-app" href="{{ route('aluno.index') }}">
                        <i class="fas fa-restroom"></i>Alunos
                    </a>
                    <a class="btn btn-app" href="{{ route('contrato.index') }}">
                        <i class="fas fa-address-card"></i>Matricular
                    </a>

                    <a class="btn btn-app" href="{{ route('contrato.home') }}">
                        <i class="fas fa-restroom"></i>Contratos
                    </a>


                    {{-- <a class="btn btn-app">
                        <i class="fas fa-file-word"></i>Relatórios
                    </a> --}}

                </div>


            </div>

        </div>
    </div>



@endsection
