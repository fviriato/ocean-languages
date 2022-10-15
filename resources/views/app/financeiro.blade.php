@extends('home')

@section('titulo', "{{ date('y/d/Y') }}")

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Módulo Financeiro</h3>
                </div>
                <h1 class="text-center text-danger">Em Desenvolvimento</h1>
                <div class="card-body">
                    {{-- <a class="btn btn-app" href="">
                        <i class="fas fa-dollar-sign"></i>Receitas
                    </a>
                    <a class="btn btn-app" href="">
                        <i class="fas fa-file-invoice-dollar"></i>Despesas
                    </a>
                    <a class="btn btn-app" href="">
                        <i class="fas fa-comments-dollar"></i> Lançamentos
                    </a>
                    <a class="btn btn-app" href="">
                        <i class="fas fa-solid fa-barcode"></i>Boletos
                    </a> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
