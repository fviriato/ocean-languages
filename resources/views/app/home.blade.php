@extends('home')

@section('titulo', "{{ date('y/d/Y') }}")

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')



    <div class="row">
        <div class="col-md-8 container-fluid">
            <h5 class="text-center text-success">{{ Auth::user()->name }}, Seja Bem Vindo(a)!</h5>
            <br>
            <br>
            <h1 class="text-center text-purple">Ocean Languages</h1>
            <br>
            <br>
            <h2 class="text-center text-primary">Sistema de Gestão</h2>
            <br>
            
        </div>
    </div>


@endsection
